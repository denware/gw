# GW - APP Tesztfeladat

## Projekt leírása:
Egy Laravel keretrendszer alapú alkalmazás készítése, ami különböző eseményekhez biztosít jegy vásárlást és adminisztrálást.

## Megvalósítás:
1. Egy Laravel Flux Starter kit-et használtam kiinduló alapnak. Ez egy tailwind és liwewire alapú alapcsomag. A táblázatos megjelenítéshez a PowerGrid nevű csomagot használtam.
2. Elvégeztem a konfigurációkat, fordításokat.
3. Először megterveztem a modelleket - User, Events, Reservation - és a hozzájuk tartozó migrációkat és seedereket.
4. Utána megírtam a szükséges rooting fájlt és a hozzá tartozó Controllereket.
5. Létrehoztam a szükséges view, livewire és Powergrid komponenseket.
6. A Powergrid komponenseknél megírtam a különböző Eloquent queryket és eseményeket pl. rekord törlése.

## Install
```
composer install
```
Ezután az env.example fájlt nevezzük el .env-re és állítsuk be a környezetet.

```
php artisan migrate:fresh --seed
npm run build
```

## Képek
![Képernyőkép 2025-05-05 – 08 52 00](https://github.com/user-attachments/assets/7b6647df-1b45-474c-9bb4-3f8aabf14ba9)
![Képernyőkép 2025-05-05 – 08 52 16](https://github.com/user-attachments/assets/47fedeca-91f7-4725-b666-214b3b123dcf)
![Képernyőkép 2025-05-05 – 08 52 24](https://github.com/user-attachments/assets/aff930e6-a4cd-41a3-a190-64327ea1645e)
![Képernyőkép 2025-05-05 – 08 52 50](https://github.com/user-attachments/assets/1f38c051-6d54-494e-a4f9-5edf8b973330)
![Képernyőkép 2025-05-05 – 08 53 13](https://github.com/user-attachments/assets/3be5e02c-b858-4487-8883-87968e8a673e)
![Képernyőkép 2025-05-05 – 08 53 20](https://github.com/user-attachments/assets/335adc55-1997-450c-9678-74565e81b159)
![Képernyőkép 2025-05-05 – 08 53 34](https://github.com/user-attachments/assets/73f51921-7173-4aae-a125-4483a2f6b573)
![Képernyőkép 2025-05-05 – 08 53 42](https://github.com/user-attachments/assets/495275db-e057-4877-9079-d52fb415454e)
