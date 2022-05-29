@component('mail::message')
# Pirkimo ataskaita

Jus nusipirkote prekes:
<table>
<tr>
    <th scope="col"></th>
    <th scope="col">Markė</th>
    <th scope="col">Modelis</th>
    <th scope="col">Prekė</th>
    <th scope="col">Kaina</th>
  </tr>
    @foreach($carts as $cart)
    @foreach($vehicleParts->where('id', $cart->part_id) as $part)
    <?php
        $totalPrice += $part->price;
    ?>
    <tr>
        <td class="w-5">
        <img src="{{ asset('storage/images/'.$part->image_path) }}" class="img-fluid img-thumbnail" style="width: 100px" alt="Sheep">
        </td>
        <td>{{ $part->model->brand->name }}</td>
        <td>{{ $part->model->name }}</td>
        <td>{{ $part->name }}</td>
        <td>{{ $part->price }} €</td>
    </tr>
    @endforeach
    @endforeach
    </table>

    Kai tik gausime patvirtinimą iš pardavėjo, jums bus atsiųsta platesnė informacija, kaip atsiimti prekę.
    

Thanks,<br>
{{ config('app.name') }}
@endcomponent
