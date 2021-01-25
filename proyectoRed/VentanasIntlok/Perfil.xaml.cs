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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Perfil.xaml
    /// </summary>
    public partial class Perfil : UserControl
    {
        public Perfil()
        {
            InitializeComponent();
        }

        private void BtnSalir_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }
        private void btn_Continuar_Click(object sender, RoutedEventArgs e)
        {
            if (validacion())
            {


            }
        }

        private bool validacion()
        {
            if (txt_Estado.MaxLength < 6)
            {
                return false;
            }
            return true;
        }

        private void btn_cambiarFoto_Click(object sender, RoutedEventArgs e)
        {
            OpenFileDialog seleccionar = new OpenFileDialog();
            seleccionar.Filter = "Imagenes|*.jpg; *.png";
            seleccionar.Title = "Seleccionar imagen";

            if (seleccionar.ShowDialog() == true)
            {
            }
        }
    }
}
