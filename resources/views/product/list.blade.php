<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h2>Productos</h2>
    <form method="POST" action="{{ route('product.store') }}" id="productForm">
        @csrf
        <label>ID:</label>
        <input type="text" name="id" id="id" readonly style="background:#eee;"><br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label>Stock:</label>
        <input type="number" name="stock" id="stock" required><br>
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" required><br>
        <label>Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <button class="primary" type="submit" id="agregarBtn">Agregar</button><br>
        <button class="primary" type="submit" id="editarBtn" style="display:none">Editar</button><br>
    </form>
    <br>
    <br>
    <script>
        function editarProducto(id, nombre, stock, precio, descripcion) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('stock').value = stock;
            document.getElementById('precio').value = precio;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('productForm').action = '/product/' + id;
            document.getElementById('productForm').method = 'POST';
            let methodInput = document.getElementById('_method');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.id = '_method';
                document.getElementById('productForm').appendChild(methodInput);
            }
            methodInput.value = 'PUT';
            document.getElementById('agregarBtn').style.display = 'none';
            document.getElementById('editarBtn').style.display = 'inline';
        }
        document.getElementById('editarBtn').onclick = function() {
            document.getElementById('productForm').submit();
        };
        document.getElementById('agregarBtn').onclick = function() {
            document.getElementById('productForm').action = '{{ route('product.store') }}';
            let methodInput = document.getElementById('_method');
            if (methodInput) methodInput.value = 'POST';
        };
    </script>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nombre }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->precio }}</td>
                <td>{{ $product->descripcion }}</td>
                <td>
                    <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="primary" type="submit">Eliminar</button>
                    </form>
                    <button class="primary" type="button" onclick="editarProducto('{{ $product->id }}', '{{ $product->nombre }}', '{{ $product->stock }}', '{{ $product->precio }}', '{{ $product->descripcion }}')">Editar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>