¡Entendido! Aquí tienes la guía actualizada para usar **`git switch`** en lugar de `git checkout` al cambiar de ramas:

---

# Guía para Desarrolladores: Uso de GitHub Flow

Este proyecto utiliza **GitHub Flow** como flujo de trabajo. A continuación, se detalla cómo trabajar con este flujo, asegurando que tu repositorio esté siempre actualizado y evitando conflictos.

## Conceptos Básicos de GitHub Flow
1. **Rama principal (`main`)**: Contiene la versión estable y funcional del proyecto.
2. **Ramas de características (`feature/tu-funcionalidad`)**: Se usan para desarrollar nuevas funcionalidades o solucionar problemas específicos. 
3. **Pull Requests (PRs)**: Se crean para solicitar la revisión y la integración de los cambios desde una rama `feature` hacia `main`.

---

## Configuración Inicial
Antes de empezar, asegúrate de clonar el repositorio y configurar tu entorno local:

1. **Clonar el repositorio**:
   ```bash
   git clone <URL-del-repositorio>
   cd <nombre-del-repositorio>
   ```

2. **Configurar tu identidad en Git** (si no lo has hecho ya):
   ```bash
   git config --global user.name "Tu Nombre"
   git config --global user.email "tuemail@example.com"
   ```

3. **Verifica que estés en la rama `main` y que esté actualizada**:
   ```bash
   git switch main
   git pull origin main
   ```

---

## Flujo de Trabajo

### 1. **Crear una rama `feature` para tu funcionalidad**
   Siempre crea una nueva rama a partir de `main` para trabajar en una funcionalidad específica:

   ```bash
   git switch main          # Cambia a la rama principal
   git pull origin main     # Asegúrate de tener la última versión de main
   git switch -c feature/tu-funcionalidad  # Crea y cambia a una nueva rama
   ```

### 2. **Realizar cambios en tu rama**
   - Trabaja en los archivos necesarios.
   - Asegúrate de realizar commits claros y descriptivos.

   **Comandos útiles**:
   - Ver qué archivos han cambiado:
     ```bash
     git status
     ```
   - Añadir archivos al área de preparación:
     ```bash
     git add <archivo>
     ```
   - Hacer un commit:
     ```bash
     git commit -m "Descripción clara de lo que cambió"
     ```

### 3. **Sincronizar tu rama con el repositorio remoto**
   - Sube tu rama al repositorio remoto:
     ```bash
     git push origin feature/tu-funcionalidad
     ```

### 4. **Crear un Pull Request (PR)**
   - Ve a la página del repositorio en GitHub.
   - Selecciona tu rama y crea un Pull Request hacia `main`.
   - Asegúrate de que el PR:
     - Describa claramente los cambios realizados.
     - Incluya cualquier detalle relevante (bugs corregidos, funcionalidades añadidas, etc.).

   **Nota**: El equipo revisará tu PR antes de que se fusione con `main`.

---

## Mantén tu Rama Actualizada
Es importante que mantengas tu rama `feature` actualizada con los últimos cambios de `main`. 

1. Cambia a `main` y obtén los últimos cambios:
   ```bash
   git switch main
   git pull origin main
   ```

2. Cambia a tu rama y fusiona los cambios de `main`:
   ```bash
   git switch feature/tu-funcionalidad
   git merge main
   ```

3. Resuelve cualquier conflicto, si los hay, y confirma los cambios:
   ```bash
   git add <archivos-modificados>
   git commit -m "Resueltos conflictos con main"
   ```

4. Vuelve a subir tu rama:
   ```bash
   git push origin feature/tu-funcionalidad
   ```

---

## Finalizar tu Rama
Una vez que tu PR sea aprobado y fusionado en `main`:

1. Cambia a `main` y actualízala:
   ```bash
   git switch main
   git pull origin main
   ```

2. Elimina la rama `feature` localmente y en el remoto:
   ```bash
   git branch -d feature/tu-funcionalidad       # Elimina la rama local
   git push origin --delete feature/tu-funcionalidad  # Elimina la rama remota
   ```

---

## Buenas Prácticas
- Siempre asegúrate de trabajar en una rama `feature`, **nunca directamente en `main`**.
- Realiza commits pequeños y descriptivos.
- Mantén tu rama `feature` sincronizada con los cambios de `main` regularmente.
- Revisa tu código antes de enviar un Pull Request.
- Comunica cualquier problema o duda al equipo.

---

Con esta guía actualizada para **`git switch`**, cualquier nuevo desarrollador podrá integrarse rápidamente al flujo de trabajo del proyecto. 🎉
