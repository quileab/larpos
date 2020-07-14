<div>
    <div class="form-inline">
        <input class="form-control" type="search" name="search" placeholder="Buscar" aria-label="Search"
            wire:model="buscar" wire:keydown.enter="barcodesearch">

        <button class="btn btn-success" type="submit" wire:click="barcodesearch">
            <i class="fas fa-search" aria-hidden="true"></i>
        </button>

        <input class="form-control" type="number" name="quantity" id="srchquantity" value="1"
            wire:model="quantity" wire:keydown.enter="barcodesearch">
    </div>
    <script>
        window.livewire.on('sweet-alert', message => {
            alert(message);
            //toast('message','danger');
            //Alert::toast('Created Successfully', 'success');
            // or whatever alerting library you'd like to use
        })
    </script>
</div>