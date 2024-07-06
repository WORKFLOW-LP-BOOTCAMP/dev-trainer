import { Controller } from '@hotwired/stimulus';
import Swal from 'sweetalert2';
export default class extends Controller {

    connect() {
        console.log('🐉')
    }

    next(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure little Padawan La Passerelle ?',
            text: "You won't be able to revert trainer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your trainer has been deleted.',
                    'success',
                )

                this.element.submit();
            }
        })
    }
}

