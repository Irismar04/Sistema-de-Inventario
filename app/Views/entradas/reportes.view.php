<main>
  <div class="container-fluid px-4">
    <div x-data="pdfMaker" class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
      <div class="mb-3">
        <a href="<?= url('entradas') ?>" class="btn btn-info absolute"><i
            class="fas fa-arrow-left"></i>&nbsp;Volver</a>
        <h2 class="text-center font-weight-light my-4">Reporte de entradas de productos</h2>
        <form x-ref="form" id="form" autocomplete="off">

          <div class="row mb-3">
            <!-- Fecha desde -->
            <div class="col">
              <label for="fechaDesde" class="form-label">Desde:</label>
              <input class="form-control" @click.outside="fechaDesde = $el.value" x-model="fechaDesde" x-ref="desde"
                id="fechaDesde" type="text" name="fromDate" placeholder="Seleccione la fecha inicial">
            </div>

            <!-- Fecha hasta -->
            <div class="col">
              <label for="fechaHasta" class="form-label">Hasta:</label>
              <input class="form-control" @click.outside="fechaHasta = $el.value" x-model="fechaHasta" x-ref="hasta"
                id="fechaHasta" type="text" name="toDate" placeholder="Seleccione la fecha final">
            </div>
          </div>

          <button class="btn btn-success" type="submit">Generar Reporte</button>
          <input class="btn btn-danger" type="reset" value="Limpiar">
        </form>
      </div>
    </div>
  </div>
</main>

<script>
  jQuery.datetimepicker.setLocale('es');
  document.addEventListener('alpine:init', () => {
    Alpine.data('pdfMaker', () => ({

      // Variables
      fechaDesde: '',
      fechaHasta: '',
      estado: 1,
      validator: '',

      init() {

        // Inicializar ambos datepickers
        jQuery(this.$refs.desde).datetimepicker({
          timepicker: false,
          format: 'Y-m-d'
        });

        jQuery(this.$refs.hasta).datetimepicker({
          timepicker: false,
          format: 'Y-m-d'
        });

        this.validator = new window.JustValidate(this.$refs.form);
        this.validator
          .addField('#fechaDesde', [{
            rule: 'required',
            errorMessage: 'La fecha inicial es obligatoria'
          }, ])
          .addField('#fechaHasta', [{
            rule: 'required',
            errorMessage: 'La fecha limite es obligatoria'
          }, ])
          .onSuccess((e) => {
            this.generar();
          });
      },

      async getProducts() {
        const response = await fetch(`<?= APP_URL ?>/api/entradas-por-fecha?desde=${this.fechaDesde}&hasta=${this.fechaHasta}`);
        const data = await response.json();
        return data;
      },

      async generar() {
        const data = await this.getProducts();
        const entradas = [];
        const DollarFormatter = Intl.NumberFormat('es-VE', {
          style: 'currency',
          currency: 'USD'
        });
        const BolivarFormatter = Intl.NumberFormat('es-VE', {
          style: 'currency',
          currency: 'VES'
        });

        data.forEach((entrada) => {
          entradas.push([
            entrada.nom_producto,
            entrada.cantidad_entrada,
            DollarFormatter.format(entrada.precio_entrada),
            BolivarFormatter.format(entrada.precio_entrada * entrada.divisa_precio),
            new Date(entrada.fecha_entrada).toLocaleDateString('es-ES')
          ]);
        })

        const doc = new window.jspdf.jsPDF()

        const titulo = 'Reporte - Entrada de productos';
        const rif = 'RIF: J-412948105';
        const direccion = 'Dirección: Guayacán de las Flores, Sector Calle 7, casa n°22';
        const nombre = 'Dueño: Edgar Zorrilla';
        const fechas =
          `Desde ${new Date(this.fechaDesde).toLocaleDateString('es-ES')} hasta ${new Date(this.fechaHasta).toLocaleDateString('es-ES')}`;
        const imgWidth = 32;
        const imgHeight = 28;
        const imgX = 10;
        const imgY = 10;

        // Añadir el título y la imagen en la misma línea
        doc.setFontSize(16);
        doc.text(titulo, imgX + imgWidth + 10, imgY - 8 + imgHeight / 2);
        doc.setFontSize(10);
        doc.text(rif, imgX + imgWidth + 10, imgY + imgHeight / 2);
        doc.text(direccion, imgX + imgWidth + 10, imgY + 8 + imgHeight / 2);
        doc.text(nombre, imgX + imgWidth + 10, imgY + 16 + imgHeight / 2);
        doc.addImage('<?= assets('/img/imagen1.png') ?>', 'PNG', imgX, imgY, imgWidth, imgHeight);
        doc.autoTable({
          didDrawPage: (data) => {
            doc.text(fechas, 10, 285);
          },
          head: [
            [
              'Nombre del producto', 'Cantidad', 'Precio (USD$)', 'Precio (Bs)', 'Fecha de entrada',
            ]
          ],
          body: entradas,
          margin: {
            top: 50
          },
        })
        doc.save(titulo);
      }
    }))
  })
</script>