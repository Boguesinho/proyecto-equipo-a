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
        public Post(int posicionPost)
        {
            this.Margin = new Thickness(0, posicionPost, 0, 0);
            InitializeComponent();
        }
    }
}
