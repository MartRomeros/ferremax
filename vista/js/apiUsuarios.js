async function obtenerUsuarios(limit = 5, offset = 0) {
try {
    const response = await fetch(`https://api.escuelajs.co/api/v1/users?limit=${limit}&offset=${offset}`);
    const usuarios = await response.json();

    const contenedor = document.getElementById('listaUsuarios');
    contenedor.innerHTML = usuarios.map(user => `
    <div class="content-user">
        <div class="usuario">
            <img src="${user.avatar}" alt="${user.name}">
            <div><strong>${user.name}</strong></div>
            <div><small>${user.email}</small></div>
            <div><small>${user.role}</small></div>
        </div>
    </div>
    `).join('');
} catch (error) {
    console.error('Error al obtener usuarios:', error);
    document.getElementById('listaUsuarios').innerText = 'No se pudieron cargar los usuarios.';
}
}

window.onload = () => obtenerUsuarios();