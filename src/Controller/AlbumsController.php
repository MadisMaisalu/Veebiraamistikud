<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlbumsController extends Controller
{
    public function default(Request $request, Response $response)
    {
        $albums =  json_decode(file_get_contents(__DIR__.'/../../data/albums.json'));
        return $this->render($response, 'default.html', ['albums' => $albums]);
    }

    public function details(Request $request, Response $response, $args=[]){
        $albums = json_decode(file_get_contents(__DIR__.'/../../data/albums.json'), true);
        
        $key = array_search($args['id'], array_column($albums, 'id' ));
        
        return $this->render($response, 'details.html', ['album' => $albums[$key]]); 
    } 
}

