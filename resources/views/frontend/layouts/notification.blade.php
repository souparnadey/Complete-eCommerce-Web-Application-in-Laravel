{{-- SUCCESS OR ERROR MESSAGE (ONLY ONE AT A TIME) --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- AUTO DISMISS --}}
<script>
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');

            // Remove after fade animation
            setTimeout(() => {
                alert.remove();
            }, 1000); // smoother fade
        });
    }, 10000); // 10 sec
</script>

