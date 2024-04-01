'use strict';

const projectPath = '';

function route(path){
    const route = projectPath.length > 0 ? `/${projectPath}${path}` : path;

    return route;
}
