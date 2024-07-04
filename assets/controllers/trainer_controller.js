import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["confirmationPopup"]

    connect() {
        console.log("Confirmation controller connected");
    }

    showConfirmation(event) {
        event.preventDefault();
        const url = event.currentTarget.href;

        if (confirm("Are you sure you want to delete this trainer?")) {
            window.location.href = url;
        }
    }
}