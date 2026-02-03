<a name="top"></a>

# 🤖🤖🤖 El patrón Facade - Guía Completa

Repositorio creado para explicar el patrón **Facade** y su implementación mediante un ejemplo práctico en **PHP** (Sistema de cine en casa).

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🤖 <a href="#-el-patrón-facade">El patrón Facade</a>
      <ul>
        <li>🛂 <a href="#-elementos-típicos-que-encontramos-en-un-patrón-facade">Elementos típicos que encontramos en un patrón Facade</a></li>
        <li>✅ <a href="#-aplicando-la-definición-a-un-caso-práctico-sistema-de-cine-en-casa">Aplicando la definición a un caso práctico: Sistema de cine en casa</a></li>
        <li>👍🏼 <a href="#-cuándo-usar-el-patrón-facade">¿Cuándo usar el patrón Facade?</a></li>
        <li>🎯 <a href="#-qué-beneficios-se-obtienen-al-aplicar-el-patrón-facade"> ¿Qué beneficios se obtienen al aplicar el patrón Facade?</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-sistema-de-cine-en-casa">Ejemplo de implementación: Sistema de cine en casa</a>
      <ul>
        <li>🎡 <a href="#-qué-hace-esta-aplicación-de-ejemplo">¿Qué hace esta aplicación de ejemplo?</a></li>
        <li>👉🏼 <a href="#-identificación-de-los-principales-archivos-del-ejemplo">Identificación de los principales archivos del ejemplo</a></li>
      </ul>
    </li>
    <li>📂 <a href="#-estructura-del-proyecto-y-composer">Estructura del Proyecto y Composer</a></li>
    <li>📋 <a href="#-requisitos">Requisitos</a></li>
    <li>🚀 <a href="#-instalación-y-ejecución">Instalación y Ejecución</a></li>
  </ul>
</details>

---

<br>

## 🤖 El patrón Facade

El patrón **Facade** es un patrón **estructural** que proporciona un **punto de entrada** sencillo a un **cliente** o **aplicación** a otro **sistema o subsistema más complejo** (conjunto completo de clases, bibliotecas, frameworks, etc...), de forma que el cliente o aplicación pueda **interactuar con el sistema complejo de forma sencilla** y sin necesidad de conocer los detalles internos de ese sistema.

La Facade actúa como una "fachada" que **oculta la complejidad interna** del sistema y **expone solo las operaciones esenciales** que la aplicación o el cliente necesita.

El **cliente solo interactúa con la Facade**, y esta se encarga de coordinar las llamadas a los distintos subsistemas.

<br>

### 🧩 Elementos típicos que encontramos en un patrón Facade

1️⃣  **Cliente**: es quien necesita realizar una tarea compleja. En lugar de lidiar con 10 clases diferentes, sólo conoce y llama a la Fachada.

Mantiene su código limpio y desacoplado de los detalles técnicos internos.

2️⃣ **Facade**: es el "punto de entrada" único. Conoce qué clases del subsistema deben actuar y en qué orden para cumplir una petición del cliente (como "Ver película"). Proporciona una interfaz simplificada, de alto nivel.

3️⃣ **Sistema complejo**: son las clases que realizan el trabajo real y detallado. No saben que la Fachada existe; ellas simplemente ejecutan sus tareas cuando se las llama. Pueden funcionar de forma independiente si alguien decide no usar la Fachada. 

<br>

### ✅ Aplicando la definición a un caso práctico: Sistema de cine en casa

Imagina que tienes un sistema de cine profesional instalado, y que para ver una película debes realizar una serie de pasos técnicos: bajar la pantalla, encender el proyector, configurar la entrada de vídeo, encender el amplificador de sonido, ajustar el volumen a un nivel adecuado, activar el sonido envolvente, encender el reproductor de DVD y, finalmente, darle a "Play".

Como usuario, **tú no quieres ser un ingeniero de sonido** cada vez que quieras ver una película; tú solo quieres pulsar un botón que diga "Ver Película".

Aquí es donde el patrón **Facade** entra en juego.

En lugar de obligarte a aprender el funcionamiento interno de cada aparato, el patrón propone crear una **capa intermedia** que hable el lenguaje de los subsistemas y te ofrezca a ti una **interfaz más simple**.

Esa capa intermedia sería la funcionalidad o funcionalidades del sistema Home Cinema, que le permitiría al usuario realizar las operaciones más comunes con pocos botones.

El mando a distancia actuaría como el **cliente** que está interactuando con la **Facade**.

Al final, la Facade no elimina el sistema complejo (el proyector, el amplificador, la pantalla y el reproductor de DVD siguen estando ahí), simplemente te regala la **abstracción** necesaria para que puedas disfrutar de la película sin tener que preocuparte por qué cable va en qué lugar.

### 👍🏼 ¿Cuándo usar el patrón Facade?

- **Simplificación de librerías**: Cuando tienes una librería o framework muy potente pero complejo, y la mayoría de veces solo necesitas usar el 10% de sus funciones.
- **Desacoplamiento**: Cuando quieres evitar que tu código dependa de docenas de clases internas de un sistema externo. Si el sistema externo cambia, solo tienes que actualizar la Fachada.
- **Puntos de entrada en capas**: Al diseñar sistemas por capas, puedes usar Fachadas como puntos de entrada para cada capa, obligando a que la comunicación sea estructurada y no caótica.

<br>

### 🎯 ¿Qué beneficios se obtienen al aplicar el patrón Facade?

📌 **Simplificar**: reduce la complejidad de un sistema complejo proporcionando una interfaz más simple.

📌 **Desacoplar**: el cliente no necesita conocer los detalles internos del subsistema.

📌 **Unificar**: agrupa múltiples operaciones relacionadas en un único punto de entrada.


<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Sistema de cine en casa

### 🎡 ¿Qué hace esta aplicación de ejemplo?

La aplicación simula una misma acción (visualización de una película en un Home Cinema) en dos escenarios diferentes:

1️⃣  **Utilizando el patrón Facade**: en este caso, la clase cliente `RemoteControl` dispone de una Facade `HomeCinemaFacade` que le permite interactuar con el sistema complejo de forma sencilla.

2️⃣  **Sin utilizar el patrón Facade**: en este caso, la clase cliente `RemoteControl` no dispone de una Facade, por lo que no se puede usar para interactuar con el sistema, y por tanto, la interacción con el sistema complejo se realiza de forma manual.

La aplicación captura la salida de ambos procesos y la presenta en una interfaz web o directamente en la terminal.

### 👉🏼 Identificación de los principales archivos del ejemplo

- 📱 **Cliente (Tú y tu Mando a Distancia)**: Representado por la clase `RemoteControl`. Tú eres el actor que decide qué quiere hacer. No te importa cómo se comunican los cables entre sí, solo quieres interactuar con una interfaz sencilla: tu mando.
Ubicado en `src/Client/RemoteControl.php`.
  
- 🎛️ **La Facade (El Home Cinema)**: Representada por la clase `HomeCinemaFacade`. Es el cerebro del mando. Cuando tú pulsas "Ver Película" en el mando, este le envía la orden a la Fachada. Ella es la que "sabe" que primero debe bajar la pantalla y luego encender el proyector, liberándote a ti de esa carga cognitiva.
Ubicado en `src/Facade/HomeCinemaFacade.php`.

- ⚙️ **El Sistema Complejo (Los Subsistemas)**: Son el amplificador, el reproductor de dvd, el proyector y la pantalla. Son componentes potentes pero difíciles de coordinar uno a uno. Siguen ahí y podrías manejarlos manualmente si quisieras (como un técnico profesional), pero gracias a la Fachada, ahora trabajan en armonía bajo una sola orden.

- ➡️ Flujo de ejecución
Ubicada en la raíz del proyecto:
- `main.php`: Orquestador principal que ejecuta ambos modos (con y sin fachada) y prepara los datos.

- 🎞️ Visualización de resultados
Ubicada en la raíz del proyecto:
- `index.php` y `styles.css`: Interfaz visual para comparar los resultados.

<br>

[🔝](#top)

---

<br>

## 📂 Estructura del Proyecto y Composer

A diferencia de ejemplos más simples donde todos los archivos están en la raíz, aquí hemos dado un paso avanzado hacia una estructura profesional de PHP moderna.

### 1. Organización del código en `src/`

Para mantener el orden hemos movido todo el código fuente a la carpeta `src/`.

### 2. Autocarga con Composer (PSR-4)

En lugar de tener una lista interminable de `require_once "archivo.php"` en nuestro `main.php`, utilizamos **Composer** para la carga automática de clases.

El archivo `composer.json` define el mapeo:
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```
Esto significa que cualquier clase con el namespace que empiece por `App\` será buscada automáticamente por PHP dentro de la carpeta `src/`. Por ejemplo, la clase `App\Subsystems\Screen.php` se buscará en `src/Subsystems/Screen.php`.

Gracias a esto, en nuestro `main.php` solo necesitamos una línea para cargar TODO el proyecto:
```php
require "vendor/autoload.php";
```

<br>

[🔝](#top)

---

<br>

## 📋 Requisitos

- **PHP 8.0** o superior.
- **[Composer](https://getcomposer.org/)**: Necesario para generar el mapa de clases (autoload).

<br>

## 🚀 Instalación y Ejecución

### 1. Instalación

1.  Clona este repositorio o descarga los archivos.
2.  Abre una terminal en la carpeta raíz del proyecto.
3.  Ejecuta el siguiente comando para generar la carpeta `vendor` y el autoloader:

    ```bash
    composer dump-autoload
    ```
    > 💡 **Nota**: Como este proyecto no tiene dependencias de librerías externas (solo usamos Composer para el autoload), basta con `composer dump-autoload`. Si hubiera librerías en `require`, usaríamos `composer install`.

### 2. Ejecución

Tienes dos alternativas para visualizar el resultado de la aplicación:
- visualizando los resultados mediante el **navegador** (con XAMPP o con un servidor web local).
- directamente desde la **terminal**, en texto plano, ejecutando el archivo principal, `main.php`.

#### 🖥️ Para ejecutarlo mediante la Terminal:

1. Abre la terminal y navega a la carpeta de tu proyecto, por ejemplo:

```bash
cd ~/Documentos/Proyectos/patrones/facade
```

2. Ejecuta, desde esa ubicación, el archivo main.php:

```bash
php main.php
```

#### 🌐 Para ejecutarlo mediante XAMPP:

1. Mueve la carpeta del proyecto a la carpeta htdocs (o equivalente según la versión de XAMPP y sistema operativo que uses).
2. Arranca XAMPP.
3. Accede a index.php desde tu navegador (por ejemplo: http://localhost/patrones/facade/index.php)

#### 🌐 Para ejecutarlo usando el servidor web interno de PHP

PHP trae un servidor web ligero que sirve para desarrollo. No necesitas instalar Apache ni XAMPP.

1. Abre la terminal y navega a la carpeta de tu proyecto:

```bash
cd ~/Documentos/.../patrones/facade
```
2. Dentro de esa ubicación, ejecuta:

```bash
php -S localhost:8000
```

>💡 No es obligatorio usar el puerto 8000, puedes usar el que desees, por ejemplo, el 8001.

Con esto, lo que estás haciendo es crear un servidor web php (cuya carpeta raíz es la carpeta seleccionada), que está escuchando en el puerto 8000 (o en el que hayas elegido).

>💡 Si quisieras, podrías crear simultáneamente tantos servidores como proyectos tengas en tu ordenador, siempre y cuando cada uno estuviera escuchando en un puerto diferente (8001, 8002, ...).

3. Ahora, abre tu navegador y accede a http://localhost:8000

Ya podrás visualizar el documento index.php con toda la información del ejemplo.

>💡 No es necesario indicar `http://localhost:8000/index.php` porque el servidor va a buscar dentro de la carpeta raíz (en este caso, en Documentos/.../patrones/facade), un archivo index.php o index.html de forma automática. Si existe, lo sirve como página principal.
>
> Por eso, estas dos URLs funcionan igual:
>
> http://localhost:8000
>
> http://localhost:8000/index.php


<br>

[🔝](#top)