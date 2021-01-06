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
    /// Lógica de interacción para Inicio.xaml
    /// </summary>
    public partial class Inicio : UserControl
    {

        int cantidadPosts = 10;
        CreacionPost creacionPost = new CreacionPost();

        public Inicio()
        {
            creacionPost.Show();
            creacionPost.Visibility = Visibility.Collapsed;
            InitializeComponent();
            mostrarPosts();

        }

        private void BtnSalir_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }

        private void mostrarPosts()
        {
            for (int i = 0; i < cantidadPosts; i++)
            {
                gridFeed.Children.Add(new Post(i * 720, i + 1, gridComentarios));
                gridFeed.Height += 720;

            }
            scrollFeed.ScrollToVerticalOffset(gridFeed.Height - 500 - (cantidadPosts * 360));

        }

        private void btn_SubirPost_Click(object sender, RoutedEventArgs e)
        {
            creacionPost.Visibility = Visibility.Visible;
        }
    }
}
