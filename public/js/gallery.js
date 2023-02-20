// selecteer ALLE kleine afbeeldingen op de pagina, evenals ALL chevrons.
const alleKleineAfbeeldingen = document.querySelectorAll("[data-kitem]");
const alleChevrons = document.querySelectorAll("[data-chevron]");

// voeg onclick-actie toe aan alle kleine afbeeldingen.
alleKleineAfbeeldingen.forEach((item) => {
  item.onclick = () => {
    // eerst vinden we de dichtsbijzijnde data-galerijid. Dit is de container van de galerij.
    // selecteer in deze container de grote afbeelding, op basis van data-gitem.
    // zelfde voor de kleine afbeeldingen.
    // selecteer de container van de kleine afbeeldingen (of miniaturen)
    // selecteer de huidige breedte van een van de kleine afbeeldingen.
    const galerij = item.parentElement.closest("[data-galerijid]");
    const groteAfbeeldingElement = galerij.querySelector("[data-gitem]");
    const kleineAfbeeldingen = galerij.querySelectorAll("[data-kitem]");
    const kleineAfbeeldingenContainer = galerij.querySelector(
      "[data-kgalerij]"
    );
    const breedteKleineAfbeelding = galerij.querySelector(".kimg").offsetWidth;

    // pas de style van de Grote Afbeelding en de chevrons aan.
    groteAfbeeldingElement.style.opacity = 0;

    const chevrons = galerij.querySelectorAll("[data-chevron]");
    chevrons.forEach((chevron) => {
      chevron.style.color = "var(--klr-hoofd-80)";
    });

    // time-out van 550s om de oude grote afbeelding te laten verdwijnen en daarna de nieuwe te laten verschijnen.
    // De src van de kleine afbeelding is gelijk aan de src van de grote. Dus als je een kleine afbeelding selecteert,
    // kopieer je de src van deze afbeelding naar de grote afbeelding.
    setTimeout(() => {
      groteAfbeeldingElement.src = item.src;
      groteAfbeeldingElement.style.opacity = 100;
      chevrons.forEach((chevron) => {
        chevron.style.color = "";
      });
    }, 500);

    // check welke kant de container op moet scrollen aan de hand van het afbeeldingID (kleiner = links, groter = rechts)
    const oudeGroteAfbeeldingID = groteAfbeeldingElement.dataset.gitem;

    if (item.dataset.kitem < oudeGroteAfbeeldingID)
      kleineAfbeeldingenContainer.scrollLeft -=
        Number(breedteKleineAfbeelding) + 25;
    else
      kleineAfbeeldingenContainer.scrollLeft +=
        Number(breedteKleineAfbeelding) + 25;

    // verplaats het selected-attribuut naar de nieuw geselecteerde kleine afbeelding.
    kleineAfbeeldingen.forEach((item) => {
      item.removeAttribute("selected");
    });
    item.setAttribute("selected", "");

    // stel nieuwe GroteAfbeeldingID in:
    groteAfbeeldingElement.dataset.gitem = item.dataset.kitem;
  };
});

alleChevrons.forEach((item) => {
  item.onclick = () => {
    // selecteer eerst de galerij aan de hand van de data-galerijid.
    // selecteer de miniaturencontainer.
    // bepaalde breedte van een van de kleine minitaturen.
    // check de pijlrichting.
    const galerij = item.parentElement.closest("[data-galerijid]");
    const kleineAfbeeldingenContainer = galerij.querySelector(
      "[data-kgalerij]"
    );
    let breedteKleineAfbeelding = galerij.querySelector(".kimg").offsetWidth;
    let pijlrichting = item.dataset.chevron;

    // pijl naar links is scrollen naar links (-=), pijl naar rechts is scrollen naar rechts. 25 = aantal pixels (gap) tussen
    // de kleine afbeeldingen.
    if (pijlrichting == "links")
      kleineAfbeeldingenContainer.scrollLeft -=
        Number(breedteKleineAfbeelding) + 25;
    else
      kleineAfbeeldingenContainer.scrollLeft +=
        Number(breedteKleineAfbeelding) + 25;

    // Verander image
    hmGalerijVeranderAfbeelding(pijlrichting, item);
  };
});

GalerijVerkrijgNrNieuweAfbeelding = (minofplus, item) => {
  // haal het afbeeldingsnummer op van de grote afbeelding en tel hier 1 (of -1) bij op. Dit is het nieuwe afbeeldingsnummer
  // van de grote afbeelding.
  const galerij = item.parentElement.closest("[data-galerijid]");
  const groteAfbeeldingElement = galerij.querySelector("[data-gitem]");
  const afbeeldingsnummer = groteAfbeeldingElement.dataset.gitem;
  const kleineAfbeeldingenContainer = galerij.querySelector("[data-kgalerij]");
  var nieuwpicnummer = Number(afbeeldingsnummer) + Number(minofplus);

  // Haal het totaal aantal aanwezige kleine afbeeldingen op. De length is meteen het nummmer
  // van de laatste afbeelding. Let op: het data-attribuut van de kleine afbeeldingen moet altijd
  // doorlopend opgeteld worden (ie: 1, 2, 3 etc.)
  let totaalAantalAfbeeldingen = galerij.querySelectorAll("[data-kitem]")
    .length;

  // Is het nieuwe afbeeldingsnummer 0 of groter dan het totaal aantal aanwezige kleine afbeeldingen,
  // zet de scroll dan weer helemaal terug naar het begin of het einde.
  if (nieuwpicnummer == 0) {
    nieuwpicnummer = totaalAantalAfbeeldingen;
    kleineAfbeeldingenContainer.scrollLeft += 2000;
  }

  if (nieuwpicnummer > totaalAantalAfbeeldingen) {
    nieuwpicnummer = 1;
    kleineAfbeeldingenContainer.scrollLeft -= 2000;
  }

  return nieuwpicnummer;
};

// verander de afbeelding
hmGalerijVeranderAfbeelding = (pijlrichting, item) => {
  // de pijlrichting bepaald of de volgende afbeelding een nummer lager of hoger heeft.
  if (pijlrichting == "links") minofplus = "-1";
  else minofplus = "+1";

  try {
    // ff element van grote afbeelding selecteren.
    const galerij = item.parentElement.closest("[data-galerijid]");
    const groteAfbeeldingElement = galerij.querySelector("[data-gitem]");

    // stel het oude afbeeldingsnummer vast en haal het nieuwe nummer op.
    var nieuwpicnummer = GalerijVerkrijgNrNieuweAfbeelding(minofplus, item);
    const afbeeldingsnummer = groteAfbeeldingElement.dataset.gitem;

    // selecteer de oude en nieuwe afbeeldingen.
    let oudeGroteAfbeelding = galerij.querySelector(
      '[data-gitem="' + afbeeldingsnummer + '"]'
    );
    let oudeKleineAfbeelding = galerij.querySelector(
      '[data-kitem="' + afbeeldingsnummer + '"]'
    );
    let nieuweKleineAfbeelding = galerij.querySelector(
      '[data-kitem="' + nieuwpicnummer + '"]'
    );

    // verwijder selected van huidige geselecteerde item
    oudeKleineAfbeelding.removeAttribute("selected");

    // voeg selected toe aan het nieuw geselecteerde item
    nieuweKleineAfbeelding.setAttribute("selected", "");

    // pas data-attribuut van grote afbeelding aan met het nieuwe afbeeldingsnummer
    oudeGroteAfbeelding.dataset.gitem = nieuwpicnummer;

    // Selecteer de nieuwe afbeelding en stel de opacity op 0 in. Dit veroorzaakt een transitie.
    let nieuweAfbeelding = galerij.querySelector(
      '[data-gitem="' + nieuwpicnummer + '"]'
    );
    nieuweAfbeelding.style.opacity = 0;

    // Vervang de src van de oude afbeelding met de src van de nieuwe na 500ms (de duur van de transitie).
    setTimeout(() => {
      nieuweAfbeelding.src = nieuweKleineAfbeelding.src;
      nieuweAfbeelding.style.opacity = 100;
    }, 550);

    // that's it!
  } catch (err) {
    console.log(err);
  }
};
