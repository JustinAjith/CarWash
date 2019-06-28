<?php

if(!function_exists('services')){
    function services() {
        $services = \App\Service::with('sub_services')->get();
        return $services;
    }
};