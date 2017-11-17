<template lang="html">
  <div>
    <part-panel>
      <div slot="heading">Inventaire des décaissements</div>
      <div slot="body">
        <part-lists-table-add>
          <tr slot="thead">
            <!-- <th>#ID</th> -->
            <th width="12%">Date</th>
            <th width="30%">Désignation</th>
            <th>Type d'opération</th>
            <th>Code</th>
            <th>Montant</th>
            <th width="">Marché</th>
            <th width="15%" style="text-align: center;">Action</th>
          </tr>
          <tr slot="tbody" v-for="decaissement in $parent.decaissements">
            <!-- <td>{{ decaissement.id }}</td> -->
            <td>{{ decaissement.date }}</td>
            <td>{{ decaissement.designation }}</td>
            <td>{{ decaissement.operation.name }}</td>
            <td>{{ decaissement.code }}</td>
            <td>{{ decaissement.montant }}</td>
            <td>{{ decaissement.marche.name }}</td>
            <td style="text-align: center;">
                <!-- <button class="button is-primary is-outlined" @click="showDecaissement(decaissement)"  data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Liste des marchés"><i class="fa fa-eye"></i></button> -->
                <button class="button is-link is-outlined" @click="editDecaissement(decaissement)" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Modifier la societe"><i class="fa fa-edit"></i></button>
                <button  @click="destroyDecaissement(decaissement)" class="button is-danger is-outlined" data-skin="dark" data-toggle="m-tooltip" title="" data-original-title="Supprimer la societe">
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
