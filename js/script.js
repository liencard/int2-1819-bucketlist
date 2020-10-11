{

  const input = document.querySelector(`input`).value;
  console.log(input);

  let specifications;
  let counter1 = 0;
  let counter2 = 0;


  const handleClickCircle = e => {
    e.preventDefault();
    console.log(e.target);
    target = e.target;

    loadSpecifications();

    // if (counter < 2) {
    //   counter++;
    // }
    // else {
    //   document.querySelector(`.circle0`).disabled = true;
    // }

  };

  const loadSpecifications = async () => {
    const url = `./assets/data/specifications.json`;
    const response = await fetch(url);
    specifications = await response.json();

    getSpecification(specifications);

  };

  const getSpecification = specifications => {

    specifications.forEach(specification => {
      //console.log(specification.id, input);
      if (specification.id == input) {

        const selectedItemA = specification.itemA[Math.floor((Math.random() * specification.itemA.length))];
        const selectedItemB = specification.itemB[Math.floor((Math.random() * specification.itemB.length))];
        console.log(selectedItemA, specification.itemA.length);
        // console.log(target);

        console.log(target.className);

        const hasClass = target.className;
        if (hasClass.includes('0')) {
          const textCircleOne = document.querySelector(`.circle-text0`);
          textCircleOne.textContent = selectedItemA;
          if (counter1 < 2) {
            counter1++;
          }
          else {
            document.querySelector(`.circle0`).disabled = true;
          }

        } else if (hasClass.includes('1')) {
          const textCircleTwo = document.querySelector(`.circle-text1`);
          textCircleTwo.textContent = selectedItemB;
          if (counter2 < 2) {
            counter2++;
          }
          else {
            document.querySelector(`.circle1`).disabled = true;
          }
        }

        console.log(hasClass.includes('0'));

      };
    });
  }

  const init = () => {

    const $circleOne = document.querySelector(`.circle0`);
    const $circleTwo = document.querySelector(`.circle1`);

    if ($circleOne) {
      $circleOne.addEventListener(`click`, handleClickCircle);
    }
    if ($circleTwo) {
      $circleTwo.addEventListener(`click`, handleClickCircle);
    }

    console.log(`test`);

  };

  init();
}
