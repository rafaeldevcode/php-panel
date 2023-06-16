<?php

namespace Src\Models;

use Src\Models\AccessToken;

class User extends Model
{
    public $table = 'users';

    /**
     * @param string $email
     * @param string password
     * @return array
     */
    public function login(string $email, string $password): array
    {
        $user = $this->where('email', $email);

        if(isset($user[0])):
            if($user[0]['status'] == 'off'):

                return ['status' => false, 'message' => 'Este usuário está inativo!'];
            elseif(password_verify($password, $user[0]['password'])):
                $this->removeTokensInvalid($user[0]['id']);
                $token = $this->generateToken(); 

                $acc_token = new AccessToken();
                $acc_token->create([
                    'token'   => $token,
                    'user_id' => $user[0]['id']
                ]);

                array_push($user, $token);

                return ['status' => true, 'message' => "Login efetuado com sucesso! Bem vindo {$user[0]['name']}", 'user' => $user];
            else:

                return ['status' => false, 'message' => 'Senha inválida!'];
            endif;
        else:

            return ['status' => false, 'message' => "Usuário não cadastrado no sistema!"];
        endif;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $token = $_SESSION['token'];

        $acc_token = new AccessToken();
        $token_id = $acc_token->where('token', $token);

        $acc_token->delete($token_id[0]['id']);

        session_destroy();
    }

    /**
     * @return string
     */
    protected function generateToken(): string
    {
        return bin2hex(random_bytes(30));
    }

    /**
     * @param int $user_id
     */
    protected function removeTokensInvalid(int $user_id): void
    {
        $acc_token = new AccessToken();
        $tokens = $acc_token->where('user_id', $user_id);

        foreach($tokens as $token):
            $acc_token->delete($token['id']);
        endforeach;
    }
}
