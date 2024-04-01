<?php

verifyMethod(500, 'POST');

use Src\Models\Posts;

$requests = requests();
$post = new Posts();

$slug = normalizeSlug($requests->title, $requests->slug);
$postSlug = $post->where('slug', '=', $slug)->first();
$thumbnail = isset($requests->thumbnail) ? $requests->thumbnail : null;
$collection = isset($requests->collection) ? $requests->collection : null;

if (is_null($postSlug) || $postSlug->id == $requests->id) {
    $post = $post->find($requests->id);

    $post->update([
        'content' => $requests->content,
        'excerpt' => getExcerpt($requests->content),
        'title' => $requests->title,
        'status' => $requests->status,
        'slug' => $slug,
        'thumbnail' => $thumbnail,
    ]);

    $post->images()->sync($collection);

    session([
        'message' => __('Post edited successfully!'),
        'type' => 'success',
    ]);

    return header(route('/admin/posts', true), true, 302);
} else {
    session([
        'message' => __('The slug is already being used, please try another one!'),
        'type' => 'danger',
    ]);

    return header(route("/admin/posts?method=edit&id={$requests->id}", true), true, 302);
};
