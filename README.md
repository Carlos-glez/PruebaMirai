# PruebaMirai

Para la primera prueba, despues de la instalación de la herramienta WP-CLI renombrando el comando a "wp" para una mayor facilidad a la hora de utilizarlo, el comando a ultilizar para la eliminación de las opciones indicadas mediante la colsola de comandos sería:

`wp site list --field=url | xargs -n1 -I % wp --url=% option delete fs_active_plugins fs_debug_mode fs_accounts fs_wsalp`

En cuanto a la segunda prueba, la he realizado de dos formas: 

- Una de ellas de manera que el footer se añade de forma automatica al activar el plugin

- La otra forma se haría añadiendo el shortcode `[info_site]` con la linea de comando `<?php wp_footer(); Echo do_shortcode ("[info_site]"); ?>` a la página en la cual se desee añadir esta información (en este caso el archivo footer.php del tema), para esta segunda opción hay que tener en cuenta que si se cambia el tema hay que volver a añadir el shortcode al archivo del footer.


Al instalar el plugin, este hará que el footer que genera se vea por duplicado, ya que como decía anteriormente, he realizado esta prueba de dos formas y así muestro como se ve el footer don ambas opciones.
