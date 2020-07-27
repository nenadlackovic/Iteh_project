# RateIt

RateIt je novonastala veb aplikacija za ocenjivanje i recenziju filmova.

![alt text](https://i.imgur.com/BfuHmrt.png)

## Tools & Technologies
- TypeScript
- TypeOrm
- Nest.js
- Php
- JQuery
- Ajax
- MySQL
- Html
- Css
- GIT

```bash
* iznad navedene jezike, tehnologije i alate koristili smo pri izradi aplikacije 
```

## Usage

### 1) Registracija 
```bash
* implementirana preko API-ja
```
Prva funkcionalnost na koju korisnik nailazi na sajtu jeste mogućnost registracije - sign up ili sign in opcija.
```bash
POST - zahtev kojim unosim podatke novog korisnika u sistem
```
![alt text](https://i.imgur.com/rvpTqkf.png)
```bash
GET - zahtev kojim uzimam podatke koje je korisnik uneo,
 proveravam da li već postoji u sistemu i ako postoji, odobravam pristup nalogu 
```
![alt text](https://i.imgur.com/TgWDhuL.png)

### 2) Pristup
#### 2.1 Admin
```bash
povlačenje informacija o filmu pomoću API-ja ( [moviedb](https://www.themoviedb.org/))
```
![alt text](https://i.imgur.com/hUJWdUK.png)
Klikom na Select dugme prikazuju se detaljnije informacije o filmu.

![alt text](https://i.imgur.com/jY4r7xf.png)

Klikom na Register dugme, admin ubacuje film u našu bazu

![alt text](https://i.imgur.com/oGhs4pQ.png)
Ovako izgleda pregled dodatih filmova u bazi, gde admin ima mogućnost da edituje, sačuva ili obriše svaki film sa spiska.

#### 2.2 Korisnik

Na tabu Movies korisnik ima mogućnost da ocenjuje filmove sa spiska (samo one koje je admin prethodno uneo).

![alt text](https://i.imgur.com/wQaFDXl.png)

Na tabu koji je imenovan kao korisnikov username stoji spisak filmova koje je korisnik ocenio, kao i njegovi komentari i ocene.

![alt text](https://i.imgur.com/rTWL2f1.png)

Klikom na PDF dugme u dnu strane korisnik dobija prikaz PDF fajla sa spiskom recenzija o ocenjenim filmovima.

![alt text](https://i.imgur.com/yH7hiS6.png)

Na About tabu, svako ko pristupi sajtu može pročitati informacije o kreatorima kao i celokupnoj svrsi veb aplikacije.

![alt text](https://i.imgur.com/JHBcB0X.png)

Kao interaktivni dodatak, dodali smo jednu igricu koja se pokreće prvobitno klikom na naziv sajta u gornjem levom uglu strane, a zatim na još jedan klik na samom tabu, gde se igrica i odvija.

![alt text](https://i.imgur.com/5eg0mvE.png)

## Stay in touch with the creators!
[Nenad Lacković](https://github.com/nenadlackovic)

[Nikola Kojić](https://github.com/NikolaKojic997)

[Vid Kusić](https://github.com/nenadlackovic)

[Milena Kašić](https://github.com/milenakasic)
