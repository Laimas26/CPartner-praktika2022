@component('mail::message')
# Pardavimo ataskaita

Jus pardavėte prekę:
    <table>
    <tr>
        <th scope="col"></th>
        <th scope="col">Markė</th>
        <th scope="col">Modelis</th>
        <th scope="col">Prekė</th>
        <th scope="col">Kaina</th>
    </tr>
    <tr>
        <td class="w-5">
        <img src="{{ asset('storage/images/'.$part->image_path) }}" class="img-fluid img-thumbnail" style="width: 100px" alt="Sheep">
        </td>
        <td>{{ $part->model->brand->name }}</td>
        <td>{{ $part->model->name }}</td>
        <td>{{ $part->name }}</td>
        <td>{{ $part->price }} €</td>
    </tr>
    </table>

    Pirkėjo informacija:
        Vardas pavardė: {{ $buyer['name'].' '.$buyer['surname'] }}
        El. Paštas: {{ $buyer['email'] }}
        Pristatymo adresas: {{ $buyer['address'].', '.$buyer['city'][0]->name.', '.$buyer['region'][0]->name.' Rajonas' }}
        Pašto kodas: {{ $buyer['zip'] }}

        Nurodytu adresu išsiųskite prekę ir tai padarius atsiųskite pranešimą
        su informacija kada išsiųsta ir kur (Pvz.: Klaipėda, Taikos Pr. 16, DPD paštomatas).
Geros dienos,<br>
{{ config('app.name') }}
@endcomponent
