<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">Inventaire des charges</div>
      <div slot="body">
        <part-lists-table-add>
          <tr slot="thead">
            <!-- <th>#ID</th> -->
            <th width="12%">Date</th>
            <th width="30%">Désignation</th>
            <th>Montant</th>
            <th>Type charge</th>
            <th>Responsable</th>
            <th>Marché</th>
            <th>Société</th>
            <th width="10%" style="text-align: center;">Action</th>
          </tr>
          <tr slot="tbody" v-for="charge in $parent.charges">
            <!-- <td>{{ charge.id }}</td> -->
            <td>{{ charge.date }}</td>
            <td>{{ charge.designation }}</td>
            <td>{{ charge.montant }}</td>
            <td>{{ charge.typecharge.name }}</td>
            <td>{{ charge.responsable.name }}</td>
            <td>{{ charge.marche.name }}</td>
            <td>{{ charge.societe.name }}</td>
            <td style="text-align: center;">
                <!-- <button class="button is-primary is-outlined" @click="showCharge(charge)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                <button class="button is-link is-outlined" @click="editCharge(charge)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                <button  @click="destroyCharge(charge)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
                  <i class="fa fa-trash"></i>
                </button>
            </td>
          </tr>
        </part-lists-table-add>
      </div>
    </part-panel>
  </div>
</template>

<script>
export default {
  mounted(){
    Event.$emit('init-datatable', 'tableAdd');
  }
}
</script>

<style lang="css">
</style>
