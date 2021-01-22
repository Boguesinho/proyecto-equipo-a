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
    /// Lógica de interacción para Historia.xaml
    /// </summary>
    public partial class Historia : UserControl
    {
        private int index;
        public Historia(int posicionHistoria, int index)
        {
            this.index = index;
            this.Margin = new Thickness(0, posicionHistoria, 0, 0);
            InitializeComponent();
        }

        private void txtBoxComentario_GotFocus(object sender, RoutedEventArgs e)
        {
            labelText.Content = "";
        }

        private void txtBoxComentario_LostFocus(object sender, RoutedEventArgs e)
        {
            if (txtBoxComentario.Text == "")
            {
                labelText.Content = "Escribe un comentario";
            }
        }

        private void txtBoxComentario_PreviewKeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                enviarComentario();
            }
        }

        private void btnEnviar_Click(object sender, RoutedEventArgs e)
        {
            txtBoxComentario.Text = "";
            txtBoxComentario.Focus();
            enviarComentario();
        }

        private void enviarComentario()
        {
            txtBoxComentario.Text = "";
            txtBoxComentario.Focus();
            //METODO PARA AGREGAR UN COMENTARIO
        }
    }
}

