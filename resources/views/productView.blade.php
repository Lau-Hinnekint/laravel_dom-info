@extends ('page')

@section ('body')

<?php
// var_dump($pivotData);
// exit;
?>

<section class="productView">

    <div class="card">

        <article class="cardHeader">

            <h4 class="cardHeader__name">{{ $product->product_name }}</h4>

            <img src="{{ $product->product_img }}" alt="" class="cardHeader__img" />

            <div class="cardHeader__box">
                <p class="cardHeader__text">{{ $product->product_desc }}</p>
            </div>

            <div class="cardHeader__box">
                <p class="cardHeader__price">{{ $product->product_price }} €</p>
                <button class="cardHeader__button button"><a href="#" class="cardHeader__link">Ajouter au panier</a></button>
            </div>
        </article>

        <article class="cardTable">

            <table class="cardTable">
                <tbody>
                        <td class="cardTable__title" colspan="2">INFORMATIONS GENERALES</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="2">INFORMATIONS GENERALES</td> -->
                        <td class="cardTable__feature">Marque</td>
                        <td class="cardTable__value">{{ $pivotData[0]->gene_brand }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Modèle</td>
                        <td class="cardTable__value">{{ $pivotData[0]->gene_model }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">PROCESSEUR</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="4">PROCESSEUR</td> -->
                        <td class="cardTable__feature">Désignation du processeur</td>
                        <td class="cardTable__value">{{ $pivotData[0]->proc_name }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Type de processeur</td>
                        <td class="cardTable__value">{{ $pivotData[0]->proc_type }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Fréquence du processeur</td>
                        <td class="cardTable__value">{{ $pivotData[0]->proc_frequency }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Chipset</td>
                        <td class="cardTable__value"> {{ $pivotData[0]->proc_chipset }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">MEMOIRE</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="3">MEMOIRE</td> -->
                        <td class="cardTable__feature">Taille de la mémoire</td>
                        <td class="cardTable__value">{{ $pivotData[0]->memo_size }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Capacité mémoire maximum</td>
                        <td class="cardTable__value">{{ $pivotData[0]->memo_capacityMax }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Type de mémoire</td>
                        <td class="cardTable__value">{{ $pivotData[0]->memo_type }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">STOCKAGE</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="4">STOCKAGE</td> -->
                        <td class="cardTable__feature">Stockage primaire</td>
                        <td class="cardTable__value">{{ $pivotData[0]->stor_primary }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Stockage secondaire</td>
                        <td class="cardTable__value">{{ $pivotData[0]->stor_secondary }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Type de stockage</td>
                        <td class="cardTable__value">{{ $pivotData[0]->stor_type }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Interface de stockage</td>
                        <td class="cardTable__value">{{ $pivotData[0]->stor_interface }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">AFFICHAGE</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="2">AFFICHAGE</td> -->
                        <td class="cardTable__feature">Chipset graphique</td>
                        <td class="cardTable__value">{{ $pivotData[0]->disp_chipset }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Mémoire graphique</td>
                        <td class="cardTable__value">{{ $pivotData[0]->disp_memory }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">RESEAUX</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="3">RESEAUX</td> -->
                        <td class="cardTable__feature">Wifi</td>
                        <td class="cardTable__value">{{ $pivotData[0]->netw_wireless }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Wifi norme</td>
                        <td class="cardTable__value">{{ $pivotData[0]->netw_wirelessNorm }}</td>
                    </tr>
                    <tr>
                        <td class="cardTable__feature">Ethernet norme</td>
                        <td class="cardTable__value">{{ $pivotData[0]->netw_norm }}</td>
                    </tr>
                        <td class="cardTable__title" colspan="2">CONNECTIQUES</td>
                    <tr>
                        <!-- <td class="cardTable__title--large" rowspan="2">CONNECTIQUES</td> -->
                        <td class="cardTable__feature">Connectiques avant</td>
                        <td class="cardTable__value">{{ $pivotData[0]->conn_front }}</td>
                    </tr>
                    <tr>

                        <td class="cardTable__feature">Connectiques arrière</td>
                        <td class="cardTable__value">{{ $pivotData[0]->conn_back }}</td>
                    </tr>
                </tbody>
            </table>

        </article>

    </div>

</section>

@endSection