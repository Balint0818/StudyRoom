<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Egyszerű tanulószoba foglalás Laravel rendszerrel

Ez egy egyszerű foglalás rendszer Laravel-al, amely lehetővé teszi a felhasználók számára, hogy időpontot foglaljanak, az adminisztrátorok pedig kezeljék ezeket az időpontokat, esetekben pedig az adott felhasználókat is.

## Telepítés

1. Klónozza le a repót:

   ```
   git clone https://github.com/username/simple-booking-laravel.git
   ```

2. Menjen a projektmappába:

   ```
   cd simple-booking-laravel
   ```

3. Telepítse a függőségeket:

   ```
   composer install
   ```

4. Telepítse a Node.js-t és a szükséges függőségeket:

   ```
   npm install
   ```

5. Hozzon létre egy `.env` fájlt és állítsa be az adatbázis beállításait:

   ```
   cp .env.example .env
   ```

6. Generálja a kulcsot:

   ```
   php artisan key:generate
   ```

7. Migrálja az adatbázist:

   ```
   php artisan migrate
   ```

8. Futtassa a fejlesztői szervert:

   ```
   php artisan serve
   ```

   Ezen kívül a Vite.js-t is futtathatja, amely figyeli a forrásfájlok változásait és frissíti azokat azonnal a böngészőben:

   ```
   npm run dev
   ```

Győződjön meg róla, hogy a Node.js és az npm telepítve van a rendszerén a Vite.js futtatásához.

## Használat

A rendszer használatához először is regisztrálnia kell. Ezután bejelentkezhet, és foglalhat időpontot.

Az adminisztrátori felület eléréséhez be kell jelentkeznie az admin felhasználóval.

Az adminisztrátorok az admin felületen kezelhetik az időpontokat, például megváltoztathatják egyes paramétereiket esetleg törölhetik őket.

A felhasználók láthatják az általuk foglalt időpontokat a "Saját időpontjaim" oldalon.

## Kezdőoldal

- Főoldal:  A felhasználó az oldal tetején található címke (One-Health) és a navigációs menü (Home, About Us, News, Időpont foglalás, Foglalásaim, Login, Register) segítségével navigálhat az oldalon. Az oldal tetején található topbar tartalmaz néhány hasznos információt, például a vállalat telefonszámát és e-mail címét. Az oldal egyéb részei az oldalon található tartalmat jelenítik meg, amelyek lehetnek például blogbejegyzések, időpontfoglalás, stb. Az alert üzenet a felhasználó számára egy rövid üzenetet jelenít meg, például egy sikeres foglalásról vagy bármilyen más fontos információról.
    Tartalmaz egy "Elérhető tantermek" című címsort, amely alatt egy sor terem található, amelyek mindegyike egy kártya stílusú dizájnnal rendelkezik, és információkat tartalmaz a terem nevéről, emeletéről és nyitvatartási idejéről. A teremkártyákat egy "owl-carousel" nevű plugin segítségével jelenítjük meg, amely lehetővé teszi a felhasználók számára, hogy balra és jobbra görgetve megtekinthessék az összes termet. A teremek információit adatbázisból töltjük be, amelynek tartalmát egy adminisztrátor frissíti.

- Időpont foglalás: Ez az oldal egy foglalási űrlapot jelenít meg egy felhasználó számára, amely lehetővé teszi számára, hogy időpontot foglaljon egy adott teremben. Az oldalon a felhasználó megadhatja a nevét, e-mail címét, foglalás kezdő és végpontját, a terem nevét és emeletét, valamint egy megjegyzést is adhat hozzá a foglaláshoz. Az oldalon található gomb megnyomásával a felhasználó elküldheti a foglalási igényét, amelyet a szerver oldalon feldolgoznak és hozzáadnak az adatbázishoz. Az oldalon emellett megjelenik a foglalt időpontok ütemezése is, hogy a felhasználók láthassák, hogy mely időpontokban mely teremek foglaltak.

- Saját foglalásaim: Ez az oldal a felhasználó által korábban létrehozott foglalásokat mutatja meg egy táblázatban. A táblázat tartalmazza az összes foglalás nevét, kezdő és vég időpontját, szobáját, Neptun kódját és egy esetleges megjegyzést. A felhasználó lehetőséget kap arra is, hogy törölje a már korábban létrehozott foglalásokat.


## Fejlesztői információk

Ez a projekt a Laravel keretrendszeren alapul. A főbb fájlok a `app/Http/Controllers/HomeController.php` és a `resources/views` könyvtárban találhatók.

Az időpontok megjelenítésére az [FullCalendar](https://fullcalendar.io/) JavaScript könyvtárat használtuk.

## Kontrollerek

AppointmentController:
- validateInput: privát metódus, amely a Request objektumot validálja a megfelelő formátumú `nk` mezőre.
- delete: a megadott `id` alapján törli az adott Appointment modell rekordját, majd a korábbi oldalra irányítja a felhasználót.
- update: a megadott `id` alapján frissíti az adott Appointment modell rekordjának mezőit a Request objektumban található adatok alapján, majd az adminisztrációs oldalra irányítja a felhasználót.
- modify: a megadott `id` alapján visszaadja a "modify_app" nézetet, amely lehetővé teszi az adott Appointment rekord módosítását.
- manage: összes Appointment modell rekordot visszaadja az "manage_appointments" nézetnek.

AdminController:
- addview: visszaadja a "add_room" nézetet, amely lehetővé teszi egy új tanulószoba hozzáadását.
- manage_users: összes User modell rekordot visszaadja a "manageusers" nézetnek.
- upload: hozzáad egy új Room modell rekordot a Request objektumban található adatok alapján, majd visszaállítja az előző oldalt a "Sikeresen létrehoztad a tanulószobát" üzenettel.
- giveAdmin: a megadott `id` alapján frissíti a megadott User modell rekordjának usertype mezőjét "1"-re, majd visszatér az előző oldalra.
- removeAdmin: a megadott `id` alapján frissíti a megadott User modell rekordjának usertype mezőjét "0"-ra, majd visszatér az előző oldalra.
- update_user: a megadott `id` alapján visszaadja az "update" nézetet, amely lehetővé teszi a User modell rekord módosítását.
- edituser: a megadott `id` alapján frissíti a megadott User modell rekordjának mezőit a Request objektumban található adatok alapján, majd visszaállítja az előző oldalt a "Sikeresen módosítottad" üzenettel.


HomeController:

- appointment: Létrehoz egy új Appointment modell rekordot a Request objektumban található adatok alapján, majd visszatér az előző oldalra a "Foglalás megtörtént, hamarosan értesítünk." üzenettel.
- create_appointment: Visszaadja a "user.create_appointment" nézetet, amely lehetővé teszi az új időpont létrehozását és megjeleníti az összes időpontot naptár formájában.
- schedule: Visszaadja a "user.schedule" nézetet, amelyben a felhasználó által lefoglalt időpontok jelennek meg naptár formájában.
- restrict: Visszatér az előző oldalra.
- myappointments: Visszaadja a "user.myappointments" nézetet, amelyben a felhasználó által lefoglalt időpontok jelennek meg oldalakra bontva.
- delete: Törli az adott időpontot, ha a felhasználó által létrehozott időpontről van szó és visszatér az előző oldalra a "Sikeresen törölted az időpont foglalást!" üzenettel. Ha nem sikerült törölni, visszatér az előző oldalra a "Sikertelen!" üzenettel.

A fenti vezérlők és metódusok az alábbi modell osztályokkal dolgoznak:
- Appointment: időpontfoglalások kezelése.
- User: felhasználók kezelése.
- Room: tanulószobák kezelése.
