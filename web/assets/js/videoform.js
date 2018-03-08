jQuery(document).ready(function() {
        // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
        var $container = $('div#trick_videos');
        // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
        var index = $container.find(':input').length;
        // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
        $('#add_video').click(function(e) {
            addVideo($container);
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });

        // La fonction qui ajoute un formulaire VideoType
        function addVideo($container) {
            // Dans le contenu de l'attribut « data-prototype », on remplace :
            // - le texte "__name__label__" qu'il contient par le label du champ
            // - le texte "__name__" qu'il contient par le numéro du champ
            var template = $container.attr('data-prototype')
                .replace(/__name__label__/g, 'Video n°' + (index+1))
                //.replace(/__name__/g,        index)
            ;
            // On crée un objet jquery qui contient ce template
            var $prototype = $(template);
            // On ajoute au prototype un lien pour pouvoir supprimer la vidéo
            addDeleteLink($prototype);
            // On ajoute le prototype modifié à la fin de la balise <div>
            $container.append($prototype);
            // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
            index++;
        }
        // La fonction qui ajoute un lien de suppression d'une vidéo
        function addDeleteLink($prototype) {
            // Création du lien
            var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
            // Ajout du lien
            $prototype.append($deleteLink);
            // Ajout du listener sur le clic du lien pour effectivement supprimer la vidéo
            $deleteLink.click(function(e) {
                $prototype.remove();
                e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                return false;
            });
        }
    });