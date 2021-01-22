using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Estado.xaml
    /// </summary>
    public partial class Estado : UserControl
    {
        private int cantidadEstados = 10;
        public Estado()
        {
            InitializeComponent();
            mostrarPosts();
        }

        private void BtnSalir_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }

        private void mostrarPosts()
        {
            for (int i = 0; i < cantidadEstados; i++)
            {
                gridEstados.Children.Add(new Historia(i * 720, i + 1));
                gridEstados.Height += 720;

            }
            scrollEstados.ScrollToVerticalOffset(gridEstados.Height - 500 - (cantidadEstados * 360));

        }
    }
}
