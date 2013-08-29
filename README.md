Exercicio de Orientação a Objetos
==

Para a utilização desse exemplo implica em termos instalado um servidor web, o PHP 5.3+. Para windows usem o Xampp; para linux usem o Lamp separadamente.

Para utilização do projeto no Windows
----

 - Faça o download do [composer][1] para windows e instale
 - Faça o download do [git][2] em linha de comando para windows e instale
 - 
    

Para utilização do projeto no Linux
----

Abra o terminal e rodem os comandos:

Git:

    $ apt-get install git
    
Composer:

    curl -sS https://getcomposer.org/installer | php
    

Abra o terminal ou cmd e navege até a pasta onde você clonou (baixaram) o projeto e digite essa linha de comando

    composer install
    
Dessa forma será instalada as dependencias para esse projeto.
Caso queira atualizar as dependencias após a instalação, se surgir alguma atualização delas, basta executar:

    composer update
    
[1]: http://getcomposer.org/
[2]: http://git-scm.com/
