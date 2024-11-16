# inventario-ABMODEL

Sistema de inventario para un negocio de barrio.

### Flujo de trabajo

- Se usará *github flow*, por lo que no está permitido pushear directamente a la rama `main`
    - se debe crear una rama con el nombre `feature/<nombre-de-la-tarea-en-trello>` para trabajar en una tarea
    - luego al terminar la tarea, se debe crear un PR (pull request) desde github y fusionar los cambios a `main`
    - esto permitirá tener en la rama `main`, solo versiones funcionales del proyecto.
- Para organizar los archivos y el código, y no crear código espagueti, se usara el patrón *MVC (modelo, vista, controlador)*.
    - **Modelo:** Incluyen las interacciones con la base de datos, como consultas, inserciones, actualizaciones o eliminaciones.
    - **Vista:** Archivo que se encarga de mostrar cosas en la página
    - **Controlador:** Recibe la solicitud del usuario, gestiona la lógica y decide qué vista mostrar.
