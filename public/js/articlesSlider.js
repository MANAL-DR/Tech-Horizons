document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.slider-1 .slider');
    const rightButton = document.getElementById('right');
    const leftButton = document.getElementById('left');
    const sliderWidth = slider.scrollWidth; // Total width of the slider
    const containerWidth = slider.parentElement.offsetWidth; // Visible width of the slider container
    let currentStep = 0; // Tracks the current step (0%, 20%, 40%, 60%, 80%)

    // Define the translateX values for each step
    const steps = [0, -20, -40, -60, -80]; // Corresponds to 0%, 20%, 40%, 60%, 80%

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
});