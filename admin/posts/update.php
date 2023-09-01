<?php
    verifyMethod(500, 'POST');
    
    use Src\Models\Posts;

    $requests = requests();
    $post = new Posts;

    $slug = normalizeSlug($requests->title, $requests->slug);
    $post_slug = $post->where('slug', '=', $slug)->first();
    $thumbnail = isset($requests->thumbnail) ? $requests->thumbnail : null;
    $collection = isset($requests->collection) ? $requests->collection : null;

    if(is_null($post_slug) || $post_slug->id == $requests->id):  
        $post = $post->find($requests->id);
        
        $post->update([
            'content' => $requests->content,
            'title' => $requests->title,
            'status' => $requests->status,
            'slug' => $slug,
            'thumbnail' => $thumbnail
        ]);

        $post->images()->sync($collection);
        
        session([
            'message' => 'Post editado com sucesso!',
            'type'    => 'success'
        ]);
        
        return header(route('/admin/posts', true), true, 302);
    else:
        session([
            'message' => 'A slug já está sendo utilizada, poo favor tente outra!',
            'type'    => 'danger'
        ]);
        
        return header(route("/admin/posts?method=edit&id={$requests->id}", true), true, 302);
    endif;
