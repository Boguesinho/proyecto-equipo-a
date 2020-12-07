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
    /// Lógica de interacción para Chat.xaml
    /// </summary>
    public partial class Chat : UserControl
    {
        public Chat()
        {
            InitializeComponent();
        }


        private void BtnSalir_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }

        private void btnEnviar_Click(object sender, RoutedEventArgs e)
        {
            
        }

        private void btnEnviarImagen_Click(object sender, RoutedEventArgs e)
        {

        }

        private void btnEnviarAudio_Click(object sender, RoutedEventArgs e)
        {

        }


        private void txtBoxMensaje_GotFocus(object sender, RoutedEventArgs e)
        {
            lbMensaje.Content = "";
        }

        private void txtBoxMensaje_LostFocus(object sender, RoutedEventArgs e)
        {
            if (txtBoxMensaje.Text == "")
                lbMensaje.Content = "Escribe un mensaje";
        }
        
        private void txtBoxMensaje_PreviewKeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                //MÉTODO ENVIAR MENSAJE
            }
        }
    }
}
