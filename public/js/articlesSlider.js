
    const slider = document.querySelector('.slider');
    const rightButton = document.getElementById('right');
    const leftButton = document.getElementById('left');
    let currentStep = 0; // Tracks the current step (0%, 20%, 40%, 60%, 80%)

    // Define the translateX values for each step
    const steps = [0, -20, -40, -60, -80 ,-100]; // Corresponds to 0%, 20%, 40%, 60%, 80%

    // Move slider to the right
    rightButton.addEventListener('click', function () {
        if (currentStep < steps.length - 1) {
            currentStep++; // Move to the next step
            const translateXValue = steps[currentStep] + '%';
            slider.style.transform = `translateX(${translateXValue})`;
        }
    });

    // Move slider to the left
    leftButton.addEventListener('click', function () {
        if (currentStep > 0) {
            currentStep--; // Move to the previous step
            const translateXValue = steps[currentStep] + '%';
            slider.style.transform = `translateX(${translateXValue})`;
        }
    });
