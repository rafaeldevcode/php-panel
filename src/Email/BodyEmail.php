<?php

namespace Src\Email;

class BodyEmail
{
    /**
     * @param array $data
     * @return string
     */
    public static function contact(array $data): string
    {
        $message = "<ul>
            <li><strong>Nome</strong>: {$data['name']}</li>
            <li><strong>Telefone</strong>: {$data['phone']}</li>
            <li><strong>Mensagem</strong>: {$data['message']}</li>
        </ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeAereo(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);
        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeAereo($indice);
            $value = ($indice == 'additional_coverage' || $indice == 'complementary_risk_coverage') ? implode(', ', json_decode($value, true)) : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeOthers(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeOthers($indice);

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeCyberRisks(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeCyberRisks($indice);

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeDeo(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeDeo($indice);
            $value = ($indice == 'activities_start_date' || $indice == 'activities_end_date' || $indice == 'feedback_start_date' || $indice == 'feedback_end_date') 
                ? date_format(date_create($value), 'd/m/Y')
                : $value;
                
            $value = $indice == 'knowledge_fact' ? implode(', ', json_decode($value, true)) : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeEeo(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeEeo($indice);
            $value = ($indice == 'validity_start_date' 
                || $indice == 'validity_end_date' 
                || $indice == 'feedback_start_date' 
                || $indice == 'feedback_end_date' 
                || $indice == 'policy_coverage_start_date' 
                || $indice == 'policy_coverage_end_date' 
                || $indice == 'start_activities') 
            ? date_format(date_create($value), 'd/m/Y')
            : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeEnvironmentalRisks(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeEnvironmentalRisks($indice);
            $value = ($indice == 'activities_start_date'
                || $indice == 'activities_end_date'
                || $indice == 'feedback_start_date'
                || $indice == 'feedback_end_date') 
            ? date_format(date_create($value), 'd/m/Y') 
            : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function safeGeneralRisks(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeGeneralRisks($indice);
            $value = ($indice == 'policy_coverage_start_date'
                    || $indice == 'policy_coverage_end_date')
                ? date_format(date_create($value), 'd/m/Y') 
                : $value; 
            
            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function finalcialLines(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelFinancialLines($indice);
            $value = ($indice == 'person_date_birth' || $indice == 'person_emission_date') 
                ? date_format(date_create($value), 'd/m/Y') 
                : $value;
            
            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function healthPlass(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelHealthPlans($indice);
            
            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @param array $vehicles
     * @return string
     */
    public static function safeVehicles(array $data, array $client, array $vehicles): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafeVehicles($indice);
            $value = ($indice == 'responsible_date_birth'
                || $indice == 'new_safe_coverage_start_date'
                || $indice == 'new_safe_coverage_end_date'
                || $indice == 'policy_coverage_start_date'
                || $indice == 'policy_coverage_end_date'
                || $indice == 'date_sinistro_occurred')
            ? date_format(date_create($value), 'd/m/Y')
            : $value; 
        
            $value = ($indice == 'additional_coverage' || $indice == 'truck_coverage') ? implode(', ', json_decode($value, true)) : $value;
            
            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";
        $message .= self::vehicles($vehicles);

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function privatePension(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelPrivatePension($indice);
            $value = $indice == 'date_birth' ? date_format(date_create($value), 'd/m/Y') : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $data
     * @param array $client
     * @return string
     */
    public static function privatePatrimonial(array $data, array $client): string
    {
        unset($data['client_id']);
        $message = self::client($client);

        if(!empty($data)) $message .= '<h4>Dados do seguro</h4>';
        $message .= "<ul>";

        foreach($data as $indice => $value):
            $result = getLabelSafePatrimonial($indice);
            $value = ($indice == 'responsible_date_birth'
                    || $indice == 'policy_coverage_start_date'
                    || $indice == 'policy_coverage_start_date')
                ? date_format(date_create($value), 'd/m/Y')
                : $value;
                
            $value = ($indice == 'additional_coverage' || $indice == 'assistance')
                ? implode(', ', json_decode($value, true))
                : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }

    /**
     * @param array $client
     * @return string
     */
    private static function client(array $client): string
    {
        $message = "<h4>Dados do cliente</h4>
            <ul>
                <li><strong>Nome</strong>: {$client['name']}</li>
                <li><strong>Email</strong>: {$client['email']}</li>
                <li><strong>Telefone</strong>: {$client['phone']}</li>
                <li><strong>Cidade</strong>: {$client['city']}</li>
                <li><strong>Estado</strong>: {$client['uf']}</li>
                <li><strong>Tipo de retorno</strong>: {$client['type_return']}</li>
            </ul>";

        return $message;
    }

    /**
     * @param array $vehicles
     * @return string
     */
    private static function vehicles(array $vehicles): string
    {
        unset($vehicles['safe_vehicles_id']);
        unset($vehicles['client_id']);
        $message = "<h4>Dados do condutor e do veículo</h4>";
        $message .= "<ul>";

        foreach($vehicles as $indice => $value):
            $result = getLabelVehicles($indice);
            $value = ($indice == 'driver_date_birth') ? date_format(date_create($value), 'd/m/Y') : $value;

            $message .= "<li><strong>{$result}</strong>: {$value}</li>";
        endforeach;

        $message .= "</ul>";

        return $message;
    }
}
