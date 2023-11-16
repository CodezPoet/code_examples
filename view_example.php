<?php
/*
* Example of a HTML View to show, add, modify, or delete records for family members of a family by an user. Records are grouped by family with relevant information like adres
* Clicking on a link to add, edit, or delete loads a relevant form view, where the user can add, delete, or edit the data. 
* The view is loaded through a controller, and it works with a model to provide the data from the database
* The view is part of a HTML page content section,in a compilation of Views to build a complete HTML page with proper heading structure, menus, etc, 
* The HTML of the view passes W3C and WCAG 2.0 Accessibility online validation.
* The view uses CSS classes and ids as applicable with HTML elements so it can be styled with CSS
*/
?>
<div id="family-wrapper">
    <div id="family-list-wrapper">
        <?php
        $html = '<div class="familie-container">';
        foreach ($records_list as $adres => $familieinfo) {
            $html .= '<div class="familie-wrapper">';
            $html .= '<div class="familienaam">';
            $html .= '<h3>Familienaam</h3>';
            $html .= '<p>' . $familieinfo['familienaam'] . '</p>';
            $html .= '</div>';
            $html .= '<div class="familie-adres">';
            $html .= '<h4>Familie Adres</h4>';
            $html .= '<p>' . $adres . '</p>';
            $html .= '</div>';
            unset($familieinfo['familienaam']);
            $html .= '<h4>Familieleden</h4>';
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
                    $html .= '<td><a href="' . $url_base_path . '?sectie=familieleden&type=aanpassen&id= ' . $familielid['id'] . '">Familielid Aanpassen</a></td>';
                    $html .= '<td><a href="' . $url_base_path . '?sectie=familieleden&type=verwijderen&id=' .  $familielid['id'] . '">Familielid Verwijderen</a></td>';
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
