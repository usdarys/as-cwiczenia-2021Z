# as-cwiczenia-2021Z
Ćwiczenia z przedmiotu Aplikacje Sieciowe 21/22Z

## Wymagania:
1. [Apache](https://httpd.apache.org/)
2. [php 7](https://www.php.net/downloads)
3. [Composer](https://getcomposer.org/download/)
4. [Node.js + npm](https://nodejs.org/en/)
5. [Postgres](https://www.postgresql.org/)

## Instalacja (Bash / Powershell)

    git clone https://github.com/usdarys/as-cwiczenia-2021Z.git
    cd as-cwiczenia-2021Z
    composer install
    cd public
    npm install

## Konfiguracja
1. Utwórz nową bazę danych i wgraj skrypt z katalogu `./resource/sql/db.sql`
2. Skopiuj katalog `./resource/config` do katalogu głównego aplikacji i uzupełnij dane konfiguracyjne bazy w pliku `./config/config.php`