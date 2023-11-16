<?php
/*
* Example of a HTML View to show, add, modify, or delete records for family members of a family for an user. 
* Records are grouped by family, with relevant information like adres. 
* The CSS classes(class="") allow for multiple instances on the same page while styling the content (instead of id(id="") which allows only one instance on the same page.
* Adding, modifying, or deleting a record will take the user to a form view, with the data automatically filled from the database if a record exists, otherwise a new unique record can be created
* The other HTML like header and footer are in other Views, where those and this View are loaded in through the Controller depending on the request the user made in the browser.
* The data in the View comes from the database through the Model, and preparing the data for the View is done in the Controller.
* The HTML views are put in a HTML folder in the Views folder. This so that other types of Views like XML can also be created in the XML folder in Views folder for example.
*
*/
?>
<div class="family-wrapper">
    <div class="family-list-wrapper">
        <?php
        $html = '<div class="familie-container">';
        foreach ($records_list as $adres => $familieinfo) {
            $html .= '<div class="familie-wrapper">';
            $html .= '<div class="familienaam">';
            $html .= '<h3>Familienaam</h3>';
            $html .= '<p>' . $familieinfo['familienaam'] . '</p>';
            $html .= '</div>';
            $html .= '<div class="familie-adres">';
            $html .= '<h3>Adres</h3>';
            $html .= '<p>' . $adres . '</p>';
            $html .= '</div>';
            unset($familieinfo['familienaam']);
            $html .= '<h3>Familieleden</h3>';
            $html .= '<p><a href="' . $url_base_path . '?sectie=familieleden&familie-id=' . $familieinfo['familie_id'] . '&type=toevoegen">Voeg familielid toe</a></p>';
            unset($familieinfo['familie_id']);
            foreach ($familieinfo as $familie) {
                $html .= '<table>';
                $html .= '<tr>';
                $html .= '<th>Persoonsnaam</th>';
                $html .= '<th>Geboortedatum</th>';
                $html .= '<th>Soort Lid</th>';
                $html .= '<th>Aanpassen</th>';
                $html .= '<th>Verwijderen</th>';
                $html .= '</tr>';
                foreach ($familie as $familielid) {
                    $html .= '<tr>';
                    $html .= '<td>' . $familielid['persoonsnaam'] . '</td>';
                    $html .= '<td>' . $familielid['geboortedatum'] . '</td>';
                    $html .= ' <td>' .  $familielid['soort_lid'] . '</td>';
                    $html .= '<td><a href="' . $url_base_path . '?sectie=familieleden&type=aanpassen&id= ' . $familielid['id'] . '">Aanpassen</a></td>';
                    $html .= '<td><a href="' . $url_base_path . '?sectie=familieleden&type=verwijderen&id=' .  $familielid['id'] . '">Verwijderen</a></td>';
                    $html .= '</tr>';
                }
                $html .= '</table>';
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        echo $html;
        ?>
    </div>
</div>
