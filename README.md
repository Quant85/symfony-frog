# Mashfrog - Challenge

---
---
## Rotte 

Seppur il progetto è attualmente di piccola entità e per praticità
 le rotte si potessero definire mediante delle *"Annotation Routes"*, per non mescolare
 parte di configurazione delle rotte con parte di logica dell'applicazione, si è preferito far gestire i Controller in autonomia 
ed inserire le rotte nel file YAML `config/routes.yaml`

---

## Entity e Repository

Nel rispetto del principio di disaccoppiamento e divisione delle responsabilità
 si è definita l' entità messaggio in Entity, mentre tutte le logiche associate 
 all' interazione con il database, quindi a fare query verso il db,
 grazie a ORM Doctrine.

Mediante l' annotation si è definita una lunghezza ragionevole di 70 caratteri,
Un testo ragionevole per uno short-message

---

## Form

Per rispettare il principio di disaccoppiamento, si è creata una classe di tipo 
classe di tipo FormType, che viene mappata verso l' entità, nel nostro caso `src/Form/MessaggioType` accoppiata a `src/Entity/Messaggio`.
In questo modo si è deciso di creare un Form in una classe e poi richiamata nel controller.

Si è scelto di non inserire il `submit` nel FormType cosi da renderlo riutilizzabile, in quanto 
un form potrebbe esser usato sia per creare un nuovo elemento ma anche 
 per modificarlo.

In questo modo cambiando la label da `submit` in `update` non ho necessità di ricreare un nuovo 
 FormType.

Per poter dare un aspetto meno *basico* dei component grafici, e che successivamente potessero esser
 impiegati anche per gli step successivi. Si è optato per `bootstrap` unito alla pre-processore css `sass`
e `Vue.Js` come framework JavaScript, creando successivamente il component
 necessario per le task successive, nel rispetto del principio di disaccoppiamento.

---

## API - API Platform

Per la creazione di una API non avendo specifiche stringenti, anche se nel caso specifico non si evince la necessità di un sistema REST API,
si è voluto implementare un `bundle` ***API-Platform*** che si integra molto bene con Symfony,
 che utilizza il suo sistema di mapping, per creare un CRUD completo sulle nostre risorse, e modificandolo
in base alle necessità.

Definiamo un file di configurazione `config/packages/api_platform.yaml`, dove dichiarando dove sono le nostre `entity`, 
il formato che ci restituisce, nel nostro caso `json` e la versione di `swagger`, che ci permette di 
avere una documentazione della nostra API.

Pe evitare problemi di CORS, che limita le richieste HTTP multi-origine, si è implementato un 
un pacchetto che mi permette di evitare tale problematica, `config/packages/nelmio_cors.yaml`.

Sistema di `routing` definito in `config/routes/api_platform.yaml`. In questo modo accedendo in 
`/api` avrò la lista delle mie API con la documentazione dell' entità , e i link ad altre risorse, rendendo la navigazione
 più agevole, nel formato `jsonld`

---

## Visualizzazione json in home

In questo caso si è deciso di usare un `component-vue` creato in `assets/vue/components/MessageComponent.vue`, al cui interno
 si è inserita sia la struttura del `template` html che verrà renderizzata in home, che la logica JavaScript, che ci permette di effettuare un chiamata all'API,
potendo scegliere il formato di restituzione tra `json` e `jsonld`, a seconda del parametro passato in selezione nel menù-dropleft.

---

## File .log

Per ogni `REQUEST` si è salvata la registrazione dell' evento con le informazioni orarie, `date`,
 trasformando il formato numerico del `timestamp` in formato *"umano"* -  ` l j M, Y h:i:s`, l' `URL` e il solo `URI`, in un file.log `var/log/test.log`.
