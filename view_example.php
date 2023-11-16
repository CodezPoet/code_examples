<?php
/*
* Example of a HTML view to show, add, modify, or delete records for family members of a family for an user. 
* Records are grouped by family, with relevant information like adres. 
* The CSS classes allow for multiple instances on the same page while styling the content (instead of id which allows only one instance on the same page).
* Adding, modifying, or deleting a record will take the user to a form view, with the data automatically filled if exists), to process with the database 
* The header and footer and other HTML are in other views, where this view is loaded in through the Controller depending on the request the user made in the browser.
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
