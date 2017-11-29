<template lang="html">
  <div>
      <global-pagetitle :color="$root.color" title="Tableau de bord" subtitle="Statistiques et liens utiles." icon="tachometer"></global-pagetitle>
      <div class="container is-fluid"><br>
        <div class="tile is-ancestor">
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="subtitle"><i class="fa fa-archive"></i>&nbsp;&nbsp;Échanges Caisses</p>
              <div class="columns">
                <div class="column">
                  <p class="title has-text-primary"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-primary"><i class="fa fa-archive"></i>&nbsp;&nbsp;Alimentations</p>
                </div>
                <div class="column">
                  <p class="title has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-danger"><i class="fa fa-archive"></i>&nbsp;&nbsp;Charges</p>
                </div>
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="subtitle"><i class="fa fa-archive"></i>&nbsp;&nbsp;Solde Caisses</p>
              <div class="columns">
                <div class="column">
                  <p class="title has-text-primary"><i class="fa fa-hdd-o"></i>&nbsp;&nbsp;1,500.00</p>
                  <p class="subtitle has-text-primary"><i class="fa fa-archive"></i>&nbsp;&nbsp;Principale</p>
                </div>
                <div class="column">
                  <p class="title has-text-danger"><i class="fa fa-hdd-o"></i>&nbsp;&nbsp;1,500.00</p>
                  <p class="subtitle has-text-danger"><i class="fa fa-archive"></i>&nbsp;&nbsp;Sans Acompte</p>
                </div>
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="subtitle"><i class="fa fa-bank"></i>&nbsp;&nbsp;Opérations Banques</p>
              <div class="columns">
                <div class="column">
                  <p class="title has-text-primary"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-primary"><i class="fa fa-archive"></i>&nbsp;&nbsp;Encaissements</p>
                </div>
                <div class="column">
                  <p class="title has-text-danger"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-danger"><i class="fa fa-archive"></i>&nbsp;&nbsp;Décaissements</p>
                </div>
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="subtitle has-text-dark"><i class="fa fa-bank"></i>&nbsp;&nbsp;Totale entités</p>
              <div class="columns">
                <div class="column">
                  <p class="title has-text-info"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-info"><i class="fa fa-building"></i>&nbsp;&nbsp;Sociétés</p>
                </div>
                <div class="column">
                  <p class="title has-text-info"><i class="fa fa-arrow-down"></i>&nbsp;&nbsp;1500</p>
                  <p class="subtitle has-text-info"><i class="fa fa-building-o"></i>&nbsp;&nbsp;Marchés</p>
                </div>
              </div>
            </article>
          </div>
        </div>

        <div class="tile is-ancestor">
          <div class="tile is-vertical is-12">
            <div class="tile">
              <div class="tile is-parent">
                <article class="tile is-child">
                  <div class="content">
                    <chart-banque-encdec-pie></chart-banque-encdec-pie>
                    <chart-caisse-chargealim-pie></chart-caisse-chargealim-pie>
                    <chart-banque-encdec-pie></chart-banque-encdec-pie>
                    <widget-help></widget-help>
                  </div>
                </article>
              </div>
              <div class="tile is-10 is-vertical">
                <div class="tile">
                  <div class="tile is-parent">
                    <article class="tile is-child">
                      <div class="content">
                        <widget-caisse-lastcombine></widget-caisse-lastcombine>
                      </div>
                    </article>
                  </div>
                  <div class="tile is-parent">
                    <article class="tile is-child">
                      <div class="content">
                        <widget-banque-lastcombine></widget-banque-lastcombine>
                      </div>
                    </article>
                  </div>
                  <div class="tile is-parent">
                    <article class="tile is-child box">
                      <div class="content">
                        <widget-clock></widget-clock>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="tile is-parent">
                  <article class="tile is-child is-6">
                      <chart-caisse-chargealim-bar></chart-caisse-chargealim-bar>
                  </article>
                  <article class="tile is-child is-6">
                      <chart-banque-encdec-bar></chart-banque-encdec-bar>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
