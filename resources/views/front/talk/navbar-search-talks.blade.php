<div class="container-fluid" style="padding-bottom: 20px;">
    <div class="row">
        <div class="navbar-form navbar-left">
            <div class="form-group" style="padding-left: 80px;">
                <input type="text" v-model="searchQuery" class="form-control" placeholder="Buscar por nombre">
            </div>

            <div class="form-group" style="padding-left: 40px;">
                <label for="">Filtrar por Fecha de Inicio</label>
                <input type="text" v-model="searchStartDate" class="form-control form_datetime">
            </div>

            <div class="form-group" style="padding-left: 40px;">
                <button class="btn btn-default" @click="order = order * -1">
                Precio <span class="@{{ order == 1 ? 'fa fa-angle-up' : 'fa fa-angle-down' }}"></span>
                </button>
            </div>
        </div>
    </div>
</div>