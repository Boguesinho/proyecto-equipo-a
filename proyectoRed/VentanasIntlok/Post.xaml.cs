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
    /// Lógica de interacción para Post.xaml
    /// </summary>
    public partial class Post : UserControl
    {
        int index;
        Grid gridComentarios;

        public Post(int posicionPost, int _index, Grid gridComentarios)
        {
            this.index = _index;
            this.gridComentarios = gridComentarios;
            this.Margin = new Thickness(0, posicionPost, 0, 0);
            InitializeComponent();
        }

        private void btnComentar_Click(object sender, RoutedEventArgs e)
        {
            gridComentarios.Children.Add(new Comentarios(index, gridComentarios));
        }
    }
}
