<?php
const SITENAME = "Talotoys";
const LANG = "es";
const URL = "http://localhost:10028/Talotoys/";

const DATOS =[
    'email' => 'talotoys@gmail.com',
    'telefono' => '123456789',  
    'direccion' => 'Calle 123',
    'ciudad' => 'Gijon',
    'pais' => 'España',
    'gps' => '40.4165000,-3.7025600'
];


const MENUPRINCIPAL = [ // array asociativo
    [
        'text' => 'Inicio',
        'url' => '/',
        'clase' => '',
        'target' => '0'
    ],
    [
        'text' => 'Catálogo',
        'url' => '/catalogo',
        'clase' => '',
        'target' => '0'
    ],
    [
        'text' => 'Blog',
        'url' => '/blog',
        'clase' => '',
        'target' => '0'
    ],
    [
        'text' => 'Contacto',
        'url' => '/contacto',
        'clase' => '',
        'target' => '0'
    ]
];

const MENUSOCIAL = [ // array asociativo
    [
        'text' => 'Facebook',
        'url' => 'https://www.facebook.com',
        'clase' => 'icon-facebook',
        'target' => '1'
    ],
    [
        'text' => 'Instagram',
        'url' => 'https://www.instagram.com',
        'clase' => 'icon-instagram',
        'target' => '1'
    ],
    [
        'text' => 'Tik Tok',
        'url' => 'https://www.tiktok.com',  
        'clase' => 'icon-tiktok',
        'target' => '1' 
    ]
];
const MENULEGAL = [ // array asociativo
    [
        'text' => 'Aviso Legal',
        'url' => '/aviso-legal',
        'clase' => '',
        'target' => '0'
    ],
    [
        'text' => 'Política de Cookies',
        'url' => '/politica-cookies',
        'clase' => '',
        'target' => '0'
    ],
    [
        'text' => 'Política de Privacidad',
        'url' => '/politica-privacidad',
        'clase' => '',
        'target' => '0'
    ]
];
//Funciona constructora de menus
//navMenu(MENUPRINCIPAL);
//navMenu(MENUSOCIAL);
//navMenu(MENULEGAL);

function navmenu($array) { 
    $menu = "<nav>";
    $menu .= "<ul>"; // el . es para añadir contenido

    foreach ($array as $item) { 
       
        $menu .= "<li><a href='{$item['url']}' class='{$item['clase']}' target='{$item['target']}'>{$item['text']}</a></li>";
    }

    $menu .= "</ul>"; 
    $menu .= "</nav>";

    echo $menu;
}


function titulo(){
    if(defined("TITULO")){ // si esto esta definido me muestras su valor
        echo TITULO;
}
echo SITENAME; // si no me muestras el valor de SITENAME=Talotoys
}


//----------------------------BASE DE DATOS--------------------------------


const HOST = "localhost";
const USER="root";
const PASS="root";
const DB="talotoysdb";

function consulta($sql, $devolver=false){
    // Crear conexión
    $conn = mysqli_connect(HOST, USER, PASS, DB);
    // Verificar conexión
    if (!$conn){
    die("Conexión fallida: " . mysqli_connect_error());
    }

    if($devolver){
        return mysqli_query($conn, $sql);
    }
    else{
        mysqli_query($conn, $sql);
    }

    //cerrar conexión
    mysqli_close($conn);
}


?>



