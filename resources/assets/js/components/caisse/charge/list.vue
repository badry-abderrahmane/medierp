<template>
  <div>
      <part-panel>
        <div slot="heading">Liste des charges</div>
        <div slot="body">
          <part-lists-table-add>
            <div slot="filter" class="row">
              <div class="col-md-2"></div>
              <part-forms-dynamic-select v-model="typecharge_id" name="typecharge_id" label="Type charge" :list="typecharges" help=""></part-forms-dynamic-select>
              <part-forms-dynamic-select v-model="responsable_id" name="responsable_id" label="Responsable" :list="responsables" help=""></part-forms-dynamic-select>
              <part-forms-dynamic-select v-model="societe_id" name="societe_id" label="Societé" :list="societes" help=""></part-forms-dynamic-select>
              <part-forms-dynamic-select v-model="marche_id" name="marche_id" label="Marché" :list="marches" help=""></part-forms-dynamic-select>
            </div>
            <tr slot="thead">
              <th class="col-xs-1">#ID</th>
              <th class="col-xs-2">Type</th>
              <th class="col-xs-2">Date</th>
              <th class="col-xs-1">Responsable</th>
              <th class="col-xs-1">Désignation</th>
              <th class="col-xs-1">Société</th>
              <th class="col-xs-1">Marché</th>
              <th class="col-xs-1">Montant</th>
              <th class="col-xs-2" style="text-align: center;">Action</th>
            </tr>
            <!-- <tr slot="tbody" v-for="product in products" v-bind:class="[product.state ? 'success' : 'danger']">
                <td class="col-xs-1">{{ product.id }}</td>
                <td class="col-xs-2">{{ product.name }}</td>
                <td class="col-xs-2">{{ product.shortDesc }}</td>
                <td class="col-xs-1">{{ product.category.name }}</td>
                <td class="col-xs-1">{{ product.serie.name }}</td>
                <td class="col-xs-1">{{ product.order }}</td>
                <td class="col-xs-1">
                  <span v-bind:class="[product.state ? 'm-badge--success' : 'm-badge--danger', 'm-badge m-badge--wide']" v-text="product.state ? 'Enabled' : 'Disabled'"></span>
                </td>
                <td class="col-xs-1">{{ product.created_at }}</td>
                <td class="col-xs-2" style="text-align: center;">

                    <button class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" @click="editProductOptions(product)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Show product options"><i class="la la-eye"></i></button>
                    <button class="btn btn-outline-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill" @click="editProduct(product)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Edit product"><i class="la la-edit"></i></button>
                    <button class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill" @click="editProductGallery(product)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Edit product gallery"><i class="la la-image"></i></button>
                    <button class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill" @click="enableProduct(product)" v-bind:data-original-title="[!product.state ? 'Enable product' : 'Disable product']"  data-skin="dark" data-toggle="m-tooltip" title="" >
                      <i v-bind:class="[product.state ? 'la-unlock-alt' : 'la-lock', 'la']"></i>
                    </button>
                    <button  @click="destroyProduct(product)" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Delete product">
                      <i class="la la-trash"></i>
                    </button>
                </td>
              </tr> -->
          </part-lists-table-add>
        </div>
      </part-panel>
  </div>
</template>

<script>

    export default {
      data(){
        return{
          typecharges:'',
          responsables:'',
          societes:'',
          marches:'',

          typecharge_id:'',
          responsable_id:'',
          societe_id:'',
          marche_id:'',
        }
      },
    }



</script>
