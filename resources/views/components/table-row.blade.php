
<!--
Componente de Fila de Tabla (<tr>) Reutilizable
Slots:
- default ($slot): Contenido de la fila (celdas <th> y <td>).
-->
<tr {{ $attributes->merge(['class' => 'bg-white border-b border-gray-200 hover:bg-gray-50']) }}>
    {{ $slot }}
</tr>
