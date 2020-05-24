<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Hoi {{$form->name }},</p>

    <p>Wat leuk dat je bij de infodag van Iewan was en dat je overweegt om bij Iewan te willen wonen!</p>

    <p>Als alle info gezakt is en je nog steeds enthousiast bent om je in te schrijven, is hier de link voor het digitale inschrijf-formulier van Iewan.</p>

    <p><a href="{{ route('show-intake-form', $form->key) }}">{{ route('show-intake-form', $form->key) }}</a></p>

<p>Neem de tijd voor het invullen. Op basis van dit formulier proberen wij in te schatten of je bij het project past. Probeer ook iets te vertellen over hoe je denkt over gemeenschappelijk wonen en wat duurzaamheid voor jou betekent.<br>
Als mensen samen willen gaan wonen, is het fijn voor ons als iedere volwassene een eigen formulier invult.<br>
    Een foto is niet verplicht maar mogelijk.</p>

Formulieren invullen en opsturen - graag - voor {{date('d F', strtotime('+2 weeks'))}}.

    <p>In de klapper staan houdt in dat je benaderd kan worden als er een woning vrijkomt. We benaderen alleen mensen op het moment dat we echt denken dat ze een kans maken.</p>

    <p>Als het invullen of opsturen van het formulier niet lukt of als je verder vragen hebt, kun je altijd bij terecht bij aanname@iewan.nl.</p>

    <p>We hopen dat alles duidelijk is!</p>
   
   <p>Groeten van de Aanname groep</p>
   
   
</body>
</html>
