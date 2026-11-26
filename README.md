# BucketList

## Om projektet

BucketList är en responsiv webbapplikation där användaren kan skapa och hantera en personlig bucketlist med saker som den vill uppleva eller genomföra i livet.

Projektet är utvecklat som en del av kursen Webbutveckling för WordPress vid Mittuniversitetet.

## Publicerad webbplats

Webbplatsen är publicerad på Mittuniversitetets webbserver.

**Webbadress:** [(https://studenter.miun.se/~vihe2504/lab2wordpress/)]

## Funktioner

- Visa aktiviteter i bucketlisten.
- Lägga till nya aktiviteter med namn, beskrivning och prioritet.
- Ta bort aktiviteter.

## Tekniker

Projektet är utvecklat med följande tekniker:

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript

## Databas

Projektet använder en MySQL-databas med tabellen `bucketlist`.

Tabellen innehåller följande kolumner:

- `id` – Unikt ID för varje aktivitet.
- `name` – Aktivitetens namn.
- `description` – Beskrivning av aktiviteten.
- `priority` – Aktivitetens prioritet.
- `created_at` – Datum då aktiviteten skapades.

Databasens struktur kan återskapas med projektets installationsskript `install.php`.

## Objektorienterad programmering

Projektet använder objektorienterad PHP. Klassen `ListItem` ansvarar för hanteringen av aktiviteter i databasen, exempelvis att lägga till och hämta aktiviteter.

## Installation av databasen

För att återskapa databasen:

1. Skapa en MySQL-databas med namnet `bucketlist`.
2. Ange korrekta databasuppgifter i `includes/config.php`.
3. Kör `install.php` för att skapa tabellen och lägga till testdata.

**Observera:** Databasuppgifterna finns inte inkluderade i projektets versionshantering och behöver anges separat.

## Författare

Victoria Helin

## Kurs

Webbutveckling för WordPress – Mittuniversitetet, 2026