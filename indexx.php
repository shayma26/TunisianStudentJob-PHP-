<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <script src=
    "https://code.jquery.com/jquery-1.12.4.min.js">
</script>
<style type="text/css">
    .select{
        display: none;
    }
</style>

</head>
<body>

<!-- 
    <h4>Users</h4>
            
            <?php foreach ($users as $user) { ?>
               <h6> <?php echo htmlspecialchars($user['prenom'].' '.$user['nom']); ?></h6>    
            <?php } ?>

        -->

        <section>
            <h1> Register </h1>
            <form method="POST" action="register.php">
                <table>
                    <tbody>
                        <tr>
                            <th><label>Nom: </label></th>
                            <td><input type="text" name="nom"></td>
                        </tr>
                        <tr>
                            <th><label>Prenom: </label></th>
                            <td><input type="text" name="prenom"></td>
                        </tr>
                        <tr>
                            <th><label>Genre: </label></th>
                            <td>
                                <input type="radio" name="genre" value="homme">Homme<br>
                                <input type="radio" name="genre" value="femme">Femme 
                            </td>
                        </tr>
                        <tr>
                            <th><label>Date de naissance: </label></th>
                            <td>
                                <input type="date" name="date_naiss"> 
                            </td>
                        </tr>
                        <tr>
                            <th><label>Pays: </label></th>
                            <td><input type="text" name="pays"></td>
                        </tr>
                        <tr>
                            <th><label>Adresse: </label></th>
                            <td><input type="text" name="adresse"></td>
                        </tr>
                        <tr>
                            <th><label>Code Postale: </label></th>
                            <td><input type="number" name="code_postal"></td>
                        </tr>
                        <tr>
                            <th><label>E-mail: </label></th>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <th><label>Numéro de téléphone: </label></th>
                            <td><input type="text" name="num_tel"></td>
                        </tr>
                        <tr>
                            <th><label>Vous êtes un: </label></th>
                            <td>
                                <input type="radio" name="type" value="etudiant" id="etudiant">Etudiant<br>
                                <input type="radio" name="type" value="employeur" id="employeur">Employeur
                            </td>
                        </tr>

                    </tbody>
                    
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('input[type="radio"]').click(function() {
                                var inputValue = $(this).attr("value");
                                var targetBox = $("." + inputValue);
                                $(".select").not(targetBox).hide();
                                $(targetBox).show();
                            });
                        });
                    </script>

                    <tbody class="etudiant select">
                        <tr>
                            <th>
                                Université: 
                            </th>
                            <td>
                                <select name="universite" id="universite">
                                    <option value="sousse">Sousse</option>
                                    <option value="kairouan">Kairouan</option>
                                    <option value="monastir">Monastir</option>
                                    <option value="carthage">Carthage</option>
                                </select>
                            </td>
                        </tr>
                        <script type="text/javascript">

                        // Map your choices to your option value
                        var lookup = {
                           'Sousse': ['ISSATSo', 'ISET', 'ISG'],
                           'Kairouan': ['ISSATK', 'ISIG'],
                           'Monastir': ['FSM'],
                       }

             /*   // When an option is changed, search the above for matching choices
                $('#universite').on('change', function() {
                // Set selected option as variable
                var selectValue = $(this).val();

                // Empty the target field
                $('#institut').empty();

                // For each choice in the selected option
                for (i = 0; i < lookup[selectValue].length; i++) {
                  // Output choice in the target field
                  $('#institu').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
                }
            });*/

        </script>
        <tr>
            <th>
                Institut: 
            </th>
            <td>
                <select id="institut", name="institut">
               </select>
               <script type="text/javascript">
                $(document).ready(function () {
                    $("#universite").change(function () {
                        var val = $(this).val();
                        if (val == "sousse") {
                            $("#institut").html("<option value='issat'>iSSAT</option><option value='eniso'>ENISO</option>");
                        } else if (val == "kairouan") {
                            $("#institut").html("<option value='issatk'>ISSATK</option><option value='isig'>ISIG</option>");
                        } else if (val == "monastir") {
                            $("#institut").html("<option value='fsm'>FSM</option><option value='enim'>ENIM</option>");
                        } else if (val == "carthage") {
                            $("#institut").html("<option value='fseg'>FSEG</option><option value='enimcar'>ENICAR</option>");
                        }
                    });
                });

            </script>
        </td>
    </tr>
    <tr>
        <th>
            Specialité: 
        </th>
        <td>
            <select name="specialite">
                <option value="genie logiciel">Genie Logiciel</option>
                <option value="info indus">Informatique Industrielle</option>
                <option></option>

            </select>
        </td>
    </tr>
    <tr>
        <th>Niveau: </th>
        <td>
            <select name="niveau">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Compétences: </th>
        <td>
            <input type="checkbox" name="competences[]" value="program web">
            <label for="programweb">Programmation Web</label>
            <input type="checkbox" name="competences[]" value="program mobile">
            <label for="programmobile">Programmation Mobile</label>
            <input type="checkbox" name="competences[]" value="cuisinier">
            <label for="cuisinier">Cuisinier</label>
            <input type="checkbox" name="competences[]" value="jardinage">
            <label for="jardinage">Jardinage</label>
            
        </td>
    </tr>
</tbody>

<tbody class="employeur select">
    <tr>
        <th>
            Nom de l'entreprise:
        </th>
        <td>
            <input type="text" name="entreprise">
        </td>
    </tr>
    <tr>
        <th><label>Pays: </label></th>
        <td>
            <select name="pays">
                <option value="tunisie">Tunisie</option>
                <option value="algerie">Algerie</option>
                <option value="marroc">Marroc</option>
                <option value="libye">Libye</option>
            </select>
        </td>
    </tr>
</tbody>
<tr>
    <th>Mot de passe: </th>
    <td><input type="text" name="mdp1"></td>
</tr>
<tr>
    <th>Confirmer le mot de passe: </th>
    <td><input type="text" name="mdp2" ></td>
</tr>
</table>
    <?php

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

    ?>
    <input type="submit" name="submit" value="Register">
</form>
</section>
</body>
</html>