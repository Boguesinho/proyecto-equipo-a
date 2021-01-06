using Microsoft.Win32;
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
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para CreacionPost.xaml
    /// </summary>
    public partial class CreacionPost : Window
    {
        bool bandImg = false;
        BitmapImage bitmap;
        public CreacionPost()
        {
            InitializeComponent();
        }

        private void btnVolver_Click(object sender, RoutedEventArgs e)
        {
            this.Visibility = Visibility.Collapsed;
        }

        private void btnElegirFoto_Click(object sender, RoutedEventArgs e)
        {

            OpenFileDialog seleccionar = new OpenFileDialog();
            seleccionar.Filter = "Imagenes|*.jpg; *.png";
            seleccionar.Title = "Seleccionar imagen";


            if (seleccionar.ShowDialog() == true)
            {
                var imgName = seleccionar.SafeFileName;
                var img = seleccionar.FileName;


                Uri file = new Uri(img);
                bitmap = new BitmapImage(file);

                imgPost.Source = bitmap;
                bandImg = true;
            }
        }

        private void btnSubirPost_Click(object sender, RoutedEventArgs e)
        {

        }
    }
}
