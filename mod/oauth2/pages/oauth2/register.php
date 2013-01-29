<?php

/**
 * Elgg OAuth2 client/application registration page
 *
 * https://tools.ietf.org/html/draft-ietf-oauth-v2-30#section-2
 *
 * @author Billy Gunn (billy@arckinteractive.com)
 * @copyright Minds.com 2013
 * @link http://minds.com
 */

$entity = null;

if ($entity = get_entity($page[1])) {

    if (!elgg_instanceof($entity, 'object', 'oauth2_client') || !$entity->canEdit()) {
        register_error(elgg_echo('oauth2:register:app_not_found'));
        forward(REFERRER);
    }
}

$title = elgg_echo('oauth2:register:title');

$content = elgg_view_form('oauth2/register', null, array('entity' => $entity));

$params = array(
    'title'   => $title, 
    'content' => $content,
    'filter'  => ''
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
